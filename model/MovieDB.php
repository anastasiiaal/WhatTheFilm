<?php

class MovieDB {

    private $apiKey;
    private $API;
    

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
        $this->API = "api_key={$this->apiKey}";
    }

    // function to get a list of movies according to search parameters
    public function getSearchResult(string $searchInput, int $page = 1): ?array {

        $data = $this->callAPI("search/movie?{$this->API}&query={$searchInput}&page={$page}");
        
        if ($data['results'] === []) {
            $results = null;
        } else {
            foreach($data['results'] as $result) {
                $results[] = [
                    'id' => $result['id'],
                    'title' => $result['title'],
                    'poster_path' => 'https://image.tmdb.org/t/p/w500' . $result['poster_path'],
                    'year' => $result['release_date'] ?? null ,
                    'vote_average' => round($result['vote_average'], 1),
                ];
            }
        }
        
        for($i=0; $i < count($results); $i++) {

            if($results[$i]['year'] !== "" && $results[$i]['year'] !== null) {
                $results[$i]['year'] = date_format(new DateTime($results[$i]['year']), "Y");
            } else {
                $results[$i]['year'] = "-";
            }
        }
        
        return $results;
    }
    
    public function getSearchPages(string $searchInput, int $page = 1) {
        $data = $this->callAPI("search/movie?{$this->API}&query={$searchInput}&page={$page}");
        $pages = [
            'page' => $data['page'],
            'total_pages' => $data['total_pages']
        ];
        return $pages;
    }

    // function to get a movie by an ID get request
    public function getMovie (int $movieID): ?array {
        $data = $this->callAPI("movie/{$movieID}?{$this->API}&language=en-US&append_to_response=videos");

        $results = [
            'id' => $data['id'],
            'poster_path' => 'https://image.tmdb.org/t/p/original/' . $data['poster_path'],
            'title' => $data['title'],
            'vote_average' => round($data['vote_average'], 1),
            'full_date' => $data['release_date'],
            'year' => $data['release_date'],
            'runtime' => intdiv($data['runtime'], 60) . 'h ' . ($data['runtime'] % 60) . 'm',
            'production_countries' => $data['production_countries'],
            'genres' => $data['genres'],
            'overview' => $data['overview'],
            'videos' => 'https://www.youtube.com/embed/' . ($data['videos']['results']? $data['videos']['results'][0]['key']: null),
            'original_title' => $data['original_title'],
            // 'original_language' => locale_get_display_language($data['original_language'] , 'en'),
            'original_language' => Locale::getDisplayLanguage($data['original_language'] , 'en'),
            // 'original_language' => $data['original_language'],
            'budget' => $data['budget'],
            'revenue' => $data['revenue']
        ];
        
        // format full release date
        if($results['full_date'] !== "") {
            $results['full_date'] = date_format(new DateTime($results['full_date']), "d M Y");
        } else {
            $results['full_date'] = "-";
        }
        // format year release date
        if($results['year'] !== "") {
            $results['year'] = date_format(new DateTime($results['year']), "Y");
        } else {
            $results['year'] = "-";
        }

        // format production countries
        if($results['production_countries'] !== []) {
            
            foreach($results['production_countries'] as $result) { 
                if($result === null) {
                    $productions[] = "-";
                } else {
                    $productions[] = "-" . $result['iso_3166_1'];
                }
            }
            foreach($productions as $countrie) {
                $countries[] = Locale::getDisplayRegion($countrie, 'en');
                // $countries[] = $countrie;
                // $countries[] = str_replace('-', '', $countrie);
            }
            $results['production_countries'] = implode(", ", $countries);
        } else {
            $results['production_countries'] = "-";
        }
        
        // format genres
        if($results['genres'] !== []) {
            foreach($results['genres'] as $result) { 
                $genres[] = $result['name'];
            }  
            $results['genres'] = implode(", ", $genres);
        } else {
            $results['genres'] = "-";
        }

        // format budget
        if($results['budget'] >1000000000){
            $results['budget'] = '$'. round(($results['budget']/1000000000),1).' B';
        }  
        else if($results['budget']>1000000) {
            $results['budget'] = '$'. round(($results['budget']/1000000),1).' M'; 
        } 
        else if($results['budget']>1000) {
            $results['budget'] = '$'. round(($results['budget']/1000),1).' K';
        } 
        else if($results['budget']===0) {
            $results['budget'] = "-";  
        }

        // format revenue
        if($results['revenue'] >1000000000){
            $results['revenue'] = '$'. round(($results['revenue']/1000000000),1).' B';
        }  
        else if($results['revenue']>1000000) {
            $results['revenue'] = '$'. round(($results['revenue']/1000000),1).' M'; 
        } 
        else if($results['revenue']>1000) {
            $results['revenue'] = '$'. round(($results['revenue']/1000),1).' K';
        } 
        else if($results['revenue']===0) {
            $results['revenue'] = "-";  
        }
        return $results;
    }

    // function to get the list of all existing film genres 
    public function getGenres () {
        $data = $this->callAPI("genre/movie/list?{$this->API}&language=en-US");
        foreach($data['genres'] as $genre) {
            $results[] = [
                'id' => $genre['id'],
                'name' => $genre['name']
            ];
        }
        
        return $results;
    }

    // function to get top rated films
    public function getFilms (string $keyWord) {
        $data = $this->callAPI("movie/{$keyWord}?{$this->API}&language=en-US&page=1");

        foreach($data['results'] as $result) {
            $results[] = [
                'id' => $result['id'],
                'title' => $result['title'],
                'poster_path' => 'https://image.tmdb.org/t/p/w500' . $result['poster_path'],
                'year' => $result['release_date'] ?? null,
                'vote_average' => round($result['vote_average'], 1)
            ];
        }
        
        // format year release date
        for($i=0; $i < count($results); $i++) {

            if($results[$i]['year'] !== "" && $results[$i]['year'] !== null) {
                $results[$i]['year'] = date_format(new DateTime($results[$i]['year']), "Y");
            } else {
                $results[$i]['year'] = "-";
            }
        }

        return $results;
    }

    // function to get a list of actors of a concrete movie
    public function getActors (int $movieId) {
        $data = $this->callAPI("movie/{$movieId}/credits?{$this->API}&language=en-US");
        if($data['cast'] !== []) {

            foreach($data['cast'] as $actor) {
                $resultsAct[] = [
                    'name' => $actor['name'],
                    'character' => $actor['character'],
                    'profile_path' => 'https://image.tmdb.org/t/p/w500' . $actor['profile_path']
                ];
            }
            
            return $resultsAct;
        }

    }

    // function to get a list of crew members of a concrete movie
    public function getCrew (int $movieId) {
        $data = $this->callAPI("movie/{$movieId}/credits?{$this->API}&language=en-US");
        if($data['crew'] !== []) {
            
            foreach($data['crew'] as $crew) {
                $resultsCr[] = [
                    'name' => $crew['name'],
                    'job' => $crew['job'],
                    'profile_path' => 'https://image.tmdb.org/t/p/w500' . $crew['profile_path'],
                ];
            }
            
            return $resultsCr;
        }

    }

    // ______________ m??thodes priv??es - ?? la fin
    private function callAPI (string $endpoint): ?array {   // $endpoint - part of link that changes || function returns un tableau ou null
        $curl = curl_init("https://api.themoviedb.org/3/{$endpoint}");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_SSL_VERIFYPEER => false,                  // delete
            CURLOPT_CAINFO         => __DIR__ . '/cert.cer',     // decomment
            CURLOPT_TIMEOUT        => 1
        ]);
        $data = curl_exec($curl);
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null;
        }
        return json_decode($data, true);   // true pour avoir un tableau associatif
    }
}