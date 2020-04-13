<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;


class ApiController extends Controller
{

    public function search_advanced(Request $request)
    {

        // Empty Search Criteria array
        $whereArray = [];

        # Check for search criteria

        // name: Should also match on partial names
        if (isset($request->name) &&  !empty($request->name)) {
            array_push($whereArray, ['name', 'like', '%' . $request->name . '%']);
        }

        // bedrooms: Exact match
        if (isset($request->bedrooms) &&  !empty($request->bedrooms)) {
            array_push($whereArray, ['bedrooms', $request->bedrooms]);
        }

        // bathrooms: Exact match
        if (isset($request->bathrooms) &&  !empty($request->bathrooms)) {
            array_push($whereArray, ['bathrooms', $request->bathrooms]);
        }
        // storeys: Exact match
        if (isset($request->storeys) &&  !empty($request->storeys)) {
            array_push($whereArray, ['storeys', $request->storeys]);
        }

        // garages: Exact match
        if (isset($request->garages) &&  !empty($request->garages)) {
            array_push($whereArray, ['garaged', $request->garages]);
        }

        // x, y: Range (between $X and $Y)
        if (
            isset($request->x) && is_numeric($request->x) &&
            isset($request->y) && is_numeric($request->y)
        ) {
            array_push($whereArray, ['price', '>=', $request->x]);
            array_push($whereArray, ['price', '<=', $request->y]);
        }

        // Check if search critieria empty return all results
        // Otherwise return filtered results
        if ($whereArray) {
            $result = Property::where($whereArray)->get();
        } else {
            $result = Property::all();
        }


        // The API should return JSON, with pure numeric data (not HTML content).
        return response()->json(['properties' => $result], 200);
    }

    public function search_simple(Request $request)
    {



        // Empty Search Criteria array
        if (!$request->keyword || empty($request->keyword)) {
            return response()->json(['properties' => []], 200);
        } else {
            $result = Property::where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('bedrooms', $request->keyword)
                ->orWhere('bathrooms', $request->keyword)
                ->orWhere('storeys', $request->keyword)
                ->orWhere('garages', $request->keyword)
                ->get();
            return response()->json(['properties' => $result], 200);
        }
    }
}
