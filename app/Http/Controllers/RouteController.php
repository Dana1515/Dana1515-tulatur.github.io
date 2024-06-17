<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Sight;


class RouteController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sum' => 'required|numeric',
            'events' => 'sometimes|nullable',
            'hotels' => 'sometimes|nullable',
            'sights' => 'sometimes|nullable',
        ]);

        $sum = $validatedData['sum'];
        $eventCombinations = [];
        $sightCombinations = [];
        $hotelCombinations = [];
        $allCombinations = [];
        $eventDate = $request->input('eventDate');

        $hotels = [];
        $events = [];
        $sights = [];

        $dateCondition = function($query) use ($eventDate) {
            $query->where(function($q) use ($eventDate) {
                $q->when($eventDate, function($subquery) use ($eventDate) {
                        $subquery->where('dates_begin', '=', $eventDate)
                                 ->where('dates_end', '=', NULL);
                    });
            })
            ->orWhere(function($q) use ($eventDate) {
                $q->when($eventDate, function($subquery) use ($eventDate) {
                        $subquery->where('dates_begin', '<=', $eventDate)
                                 ->where('dates_end', '>=', $eventDate);
                    });
            });
        };
        
        if ($request->has('hotels') && $request->has('events') && $request->has('sights')) {
            $hotels = Hotel::where('price', '<=', $sum)->get();
            $events = Event::where('price', '<=', $sum)->where($dateCondition)->get();
            $eventCombinations = $this->generateCombinations($events, $sum);
            $sights = Sight::where('price', '<=', $sum)->get();
            $sightCombinations = $this->generateCombinations($sights, $sum);
            $allCombinations = $this->generateAllCombinations($hotels, $eventCombinations, $sightCombinations, $sum);
        } elseif ($request->has('hotels') && $request->has('events')) {
            $hotels = Hotel::where('price', '<=', $sum)->get();
            $events = Event::where('price', '<=', $sum)->where($dateCondition)->get();
            $eventCombinations = $this->generateCombinations($events, $sum);
            $allCombinations = $this->generateCombinationsWithoutSights($hotels,$eventCombinations, $sum);
        } elseif ($request->has('hotels') && $request->has('sights')) {
            $hotels = Hotel::where('price', '<=', $sum)->get();
            $sights = Sight::where('price', '<=', $sum)->get();
            $sightCombinations = $this->generateCombinations($sights, $sum);
            $allCombinations = $this->generateCombinationsWithoutEvents($hotels,$sightCombinations, $sum);
        } elseif($request->has('events')&& $request->has('sights')) {
            $events = Event::where('price', '<=', $sum)->where($dateCondition)->get();
            $eventCombinations = $this->generateCombinations($events, $sum);
            $sights = Sight::where('price', '<=', $sum)->get();
            $sightCombinations = $this->generateCombinations($sights, $sum);
            $allCombinations = $this->generateCombinationsWithoutHotels($eventCombinations,$sightCombinations,$sum);
        } elseif($request->has('events')){
            $events = Event::where('price', '<=', $sum)->where($dateCondition)->get();
            $eventCombinations = $this->generateCombinations($events, $sum);
            $allCombinations = $this->generateEventCombinations($eventCombinations, $sum);
        } elseif($request->has('sights')){
            $sights = Sight::where('price', '<=', $sum)->get();
            $sightCombinations = $this->generateCombinations($sights, $sum);
            $allCombinations = $this->generateSightCombinations($sightCombinations, $sum);
        } elseif($request->has('hotels')){
            $hotels = Hotel::where('price', '<=', $sum)->get();
            $hotelCombinations = $this->generateCombinations($hotels, $sum);
            $allCombinations = $this->generateSightCombinations($hotelCombinations, $sum);

        }
        return view('search', [
            'sum' => $sum,
            'hotels' => $hotelCombinations ?? null, 
            'eventCombinations' => $eventCombinations ?? null,
            'sightCombinations' => $sightCombinations ?? null,
            'allCombinations' => $allCombinations ?? null
        ]);
      
    }

    private function generateCombinations($items, $sum) {
        $allCombinations = [];
        $combination = [];
        $this->searchCombinations(0, 0, $items, $combination, $allCombinations, $sum);
        return $allCombinations;
    }
    
    private function searchCombinations($currentIndex, $currentSum, $items, $combination, &$allCombinations, $sum) {
        if ($currentSum > $sum) {
            return;
        }
        if ($currentSum <= $sum && count($combination) > 0) {
            $allCombinations[] = $combination;
        }
        for ($i = $currentIndex; $i < count($items); $i++) {
            if ($currentSum + $items[$i]->price <= $sum) {
                $newCombination = $combination;
                array_push($newCombination, $items[$i]);
                $this->searchCombinations($i + 1, $currentSum + $items[$i]->price, $items, $newCombination, $allCombinations, $sum);
            }
        }
    }
    private function generateAllCombinations($hotels, $events, $sights, $sum) {
        $allCombinations = [];
        $usedHotels = [];
        $usedEvents = [];
        $usedSights = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
    
        foreach ($hotels as $hotel) {
            $remainingSum = $sum - $hotel->price;
    
            foreach ($events as $eventCombination) {
                foreach ($sights as $sightCombination) {
                    $totalEventPrice = array_sum(array_column($eventCombination, 'price'));
                    $totalSightPrice = array_sum(array_column($sightCombination, 'price'));
                    $totalPrice = $hotel->price + $totalEventPrice + $totalSightPrice;
                    if ($totalPrice <= $sum
                        && !in_array($hotel, $usedHotels)
                        && !in_array($eventCombination, $usedEvents)
                        && !in_array($sightCombination, $usedSights)) {
                        $allCombinations[] = [
                            'hotel' => $hotel, 
                            'events' => $eventCombination, 
                            'sights' => $sightCombination
                        ];
                        $combinationsCount++;
                        $usedHotels[] = $hotel;
                        $usedEvents[] = $eventCombination;
                        $usedSights[] = $sightCombination;
                        if ($combinationsCount >= $maxCombinations) {
                            return $allCombinations; 
                        }
                    }
                }
            }
        }
    
        
        return $allCombinations;
    }
    private function generateCombinationsWithoutHotels($events, $sights, $sum){
        $allCombinations = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
        $usedEvents = [];
        $usedSights = [];
    
        foreach ($events as $eventCombination){
            foreach ($sights as $sightCombination){
                $totalEventPrice = array_sum(array_column($eventCombination, 'price'));
                $totalSightPrice = array_sum(array_column($sightCombination, 'price'));
                $totalPrice = $totalEventPrice + $totalSightPrice;
                
                if ($totalPrice <= $sum
                    && !in_array($eventCombination, $usedEvents)
                    && !in_array($sightCombination, $usedSights)){
                    $allCombinations[] = ['events' => $eventCombination, 'sights' => $sightCombination];
                    $combinationsCount++;
    
                    $usedEvents[] = $eventCombination;
                    $usedSights[] = $sightCombination;
    
                    if ($combinationsCount >= $maxCombinations) {
                        return $allCombinations; 
                    }
                }
            }
        }
        return $allCombinations;
    }
    private function generateCombinationsWithoutEvents($hotels, $sights, $sum) {
        $allCombinations = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
        $usedHotels = [];
        $usedSights = [];
    
        foreach ($hotels as $hotel) {
            $remainingSum = $sum - $hotel->price;
            
            foreach ($sights as $sightCombination) {
                $totalSightPrice = array_sum(array_column($sightCombination, 'price'));
                $totalPrice = $hotel->price + $totalSightPrice;
                
                if ($totalPrice <= $sum
                    && !in_array($hotel->id, $usedHotels)
                    && !in_array($sightCombination, $usedSights)) {
                    $allCombinations[] = [
                        'hotel' => $hotel,  
                        'sights' => $sightCombination
                    ];
                    $combinationsCount++;
                    $usedHotels[] = $hotel->id;
                    $usedSights[] = $sightCombination;
    
                    if ($combinationsCount >= $maxCombinations) {
                        return $allCombinations;
                    }
                }
            }
        }
        return $allCombinations;
    }
    private function generateCombinationsWithoutSights($hotels, $events, $sum) {
        $allCombinations = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
        $usedHotels = [];
        $usedEvents = [];
    
        foreach ($hotels as $hotel) {
            $remainingSum = $sum - $hotel->price;
            
            foreach ($events as $eventCombination) {
                $totalEventPrice = array_sum(array_column($eventCombination, 'price'));
                $totalPrice = $hotel->price + $totalEventPrice;
                
                if ($totalPrice <= $sum
                    && !in_array($hotel->id, $usedHotels)
                    && !in_array($eventCombination, $usedEvents)) {
                    $allCombinations[] = [
                        'hotel' => $hotel,  
                        'events' => $eventCombination
                    ];
                    $combinationsCount++;
                    $usedHotels[] = $hotel->id;
                    $usedEvents[] = $eventCombination;
    
                    if ($combinationsCount >= $maxCombinations) {
                        return $allCombinations;
                    }
                }
            }
        }
        return $allCombinations;
    }
    private function generateEventCombinations($events, $sum) {
        $allCombinations = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
        $usedEventIds = [];
    
        foreach ($events as $eventCombination) {
            $eventIds = array_column($eventCombination, 'id');
            $totalEventPrice = array_sum(array_column($eventCombination, 'price'));
            $totalPrice = $totalEventPrice;
            
            $hasDuplicateEvent = count(array_intersect($eventIds, $usedEventIds)) > 0;
            
            if ($totalPrice <= $sum && !$hasDuplicateEvent) {
                $allCombinations[] = ['events' => $eventCombination];
                $combinationsCount++;
                $usedEventIds = array_merge($usedEventIds, $eventIds);
    
                if ($combinationsCount >= $maxCombinations) {
                    return $allCombinations;
                }
            }
        }
        return $allCombinations;
    }
    private function generateSightCombinations($sights, $sum){
        $allCombinations = [];
        $combinationsCount = 0;
        $maxCombinations = 10;
        $usedSightIds = [];
    
        foreach ($sights as $sightCombination) {
            $sightIds = array_column($sightCombination, 'id');
            $totalSightPrice = array_sum(array_column($sightCombination, 'price'));
            $totalPrice = $totalSightPrice;
            
            $hasDuplicateSight = count(array_intersect($sightIds, $usedSightIds)) > 0;
            
            if ($totalPrice <= $sum && !$hasDuplicateSight) {
                $allCombinations[] = ['sights' => $sightCombination];
                $combinationsCount++;
                $usedSightIds = array_merge($usedSightIds, $sightIds);
    
                if ($combinationsCount >= $maxCombinations) {
                    return $allCombinations;
                }
            }
        }
        return $allCombinations;
    }
}



