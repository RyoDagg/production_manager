<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\Product;
use App\Models\Production;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function get_production()
    {
        $products = Product::all();
        $production= Production::orderBy('created_at', 'DESC')->get();
        return view('tables.productions')->with('productions', $production)
                                        ->with('products', $products);
    }

    public function new_production(Request $request)
    {

        // $existent = Product::where('fournisseur_id', $request->get('fournisseur_id'))->where('status', null)->get();

        // if ($existent->count()) {
        //     return back()->withError('There is already an unfinished purchase assigned to this supplier. <a href="' . route('tables.fournisseurs', $existent->first()) . '">Click here to go to it</a>');
        // }


        // ddd($request->input());
        $production = new Production();

        $production->product_id = $request->input('product');
        $production->quantity = $request->input('quantity');

        $production->save();
        return redirect()->back();
    }

    public function view_production($id)
    {
        $production = Production::find($id);
        return view('tables.production', ['production' => $production]);
    }

    public function validate_production($id, $action)
    {
        $production = Production::find($id);
        if (($production->status = 'pending') && ($action != 'completed')) {
            $production->status  = $action;
            if ($action == 'progress') {
                foreach ($production->products->materials as $material) {
                    $cost = $material->pivot->quantity * $production->quantity;
                    $material->stock -= $cost;
                    $material->save();
                }
            }

            $production->save();
            return redirect()->back()->with('status','Production '.$action.' successfully!!');
        }
        return redirect()->back()->with('fail');
    }

    public function complete_production($id)
    {
        $production = Production::find($id);
        if ($production->status = 'progress') {
            $production->status  = 'completed';
            $product = $production->products;
            $product->stock += $production->quantity;
            $production->save();
            $product->save();
            return redirect()->back()->with('status','Production Completed successfully!!');
        }
        return redirect()->back()->with('fail');
    }

    public function productions_reports()
    {
        // ddd(Carbon::now()->startOfWeek());
        $production = Production::orderBy('created_at', 'DESC')->get();
        $annualproductions = $this->getAnnualProductions();
        $monthlyproductions = $this->getMonthlyProductions();
        $weeklyproductions = $this->getWeeklyProductions();
        $dailyproductions = $this->getDailyProductions();

        return view('reports.productions', [
            'productions'                      => $production,
            'annualproductions'                => $annualproductions,
            'dailyproductions'              => $monthlyproductions,
            'dailyproductions'                => $weeklyproductions,
            'dailyproductions'              => $dailyproductions
        ]);
    }
    public function getAnnualProductions()
    {
        // $sales = [];
        // foreach(range(1, 12) as $i) {
        //     $monthlySalesCount = Sale::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->count();

        //     array_push($sales, $monthlySalesCount);
        // }
        // return "[" . implode(',', $sales) . "]";
        return Production::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
    }

    public function getMonthlyProductions()

    {
        //->whereMonth('created_at', '=', Carbon::now()->subMonth()->month
        return Production::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
    }

    public function getWeeklyProductions()
    {
       return Production::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
       
    }
    public function getDailyProductions()
    {
      return Production::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get();
        
    }
    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $productions = Production::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $productions = Production::latest()->get();
                }
            } else {
                $productions = Production::latest()->get();
            }

            return response()->json([
                'productions' => $productions
            ]);
        } else {
            abort(403);
        }
    }
}
