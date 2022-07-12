<?php

class MovieDB {

    private $apiKey;
    private $API;
    

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
        $this->API = "api_key={$this->apiKey}";
    }

    // function to get a list of movies according to search parameters
    public function getSearchResult(string $searchInput, int $page): ?array {

        $data = $this->callAPI("search/movie?{$this->API}&query={$searchInput}&page={$page}");
        // var_dump($data);

        if ($data['results'] === []) {
            $results = null;
        } else {
            foreach($data['results'] as $result) {
                $results[] = [
                    'id' => $result['id'],
                    'title' => $result['title'],
                    'poster_path' => 'https://image.tmdb.org/t/p/w500' . $result['poster_path'],
                    'year' => date_format(new DateTime($result['release_date'] ?? null),"Y"),
                    'vote_average' => $result['vote_average']
                ];
            }
        }
        
        return $results;

    }

    // function to get a movie by an ID get request
    public function getMovie (int $movieID): ?array {
        $data = $this->callAPI("movie/{$movieID}?{$this->API}&language=en-US&append_to_response=videos");

        $results = [
            'id' => $data['id'],
            'poster_path' => 'https://image.tmdb.org/t/p/original/' . $data['poster_path'],
            'title' => $data['title'],
            'vote_average' => $data['vote_average'],
            'full_date' => date_format(new DateTime($data['release_date']), "d M Y"),
            'year' => date_format(new DateTime($data['release_date']), "Y"),
            'runtime' => date("G\h i\m", $data['runtime']*60),
            'production_countries' => $data['production_countries'],
            'genres' => $data['genres'],
            'overview' => $data['overview'],
            'videos' => 'https://www.youtube.com/embed/' . ($data['videos']['results']? $data['videos']['results'][0]['key']: null),
            'original_title' => $data['original_title'],
            'original_language' => Locale::getDisplayLanguage($data['original_language'] , 'en'),
            'budget' => $data['budget'],
            'revenue' => $data['revenue']
        ];

        // format production countries
        foreach($results['production_countries'] as $result) { 
            $productions[] = "-" . $result['iso_3166_1'];
        }
        foreach($productions as $countrie) {
            $countries[] = Locale::getDisplayRegion($countrie, 'en');
        }
        $results['production_countries'] = implode(", ", $countries);

        // format genres
        foreach($results['genres'] as $result) { 
            $genres[] = $result['name'];
        }  
        $results['genres'] = implode(", ", $genres);

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
        // var_dump($results);
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

    // function to get list of films according to selected genres
    public function getFilmsByGenre (string $genreIds) {
        $data = $this->callAPI("discover/movie?sort_by=popularity.desc&{$this->API}&with_genres={$genreIds}");

        foreach($data['results'] as $result) {
            $results[] = [
                'id' => $result['id'],
                'title' => $result['title'],
                'poster_path' => 'https://image.tmdb.org/t/p/w500' . $result['poster_path'],
                'year' => date_format(new DateTime($result['release_date']),"Y"),
                'vote_average' => $result['vote_average']
            ];
        }
        
        return $results;
    }

    // function to get a list of actors of a concrete movie
    public function getActors (int $movieId) {
        $data = $this->callAPI("movie/{$movieId}/credits?{$this->API}&language=en-US");

        foreach($data['cast'] as $actor) {
            $resultsAct[] = [
                'name' => $actor['name'],
                'character' => $actor['character'],
                'profile_path' => 'https://image.tmdb.org/t/p/w500' . $actor['profile_path']
            ];
        }

        return $resultsAct;

    }

    // function to get a list of crew members of a concrete movie
    public function getCrew (int $movieId) {
        $data = $this->callAPI("movie/{$movieId}/credits?{$this->API}&language=en-US");

        foreach($data['crew'] as $crew) {
            $resultsCr[] = [
                'name' => $crew['name'],
                'job' => $crew['job'],
                'profile_path' => 'https://image.tmdb.org/t/p/w500' . $crew['profile_path'],
            ];
        }
        
        return $resultsCr;

    }

    // // pagination function
    // public function getPage (string $url) {
    //     $data = $this->callAPI("{$url}&page=");

    //     return $data;
    // }


    // ______________ méthodes privées - à la fin
    private function callAPI (string $endpoint): ?array {   // $endpoint - part of link that changes || function returns un tableau ou null
        $curl = curl_init("https://api.themoviedb.org/3/{$endpoint}");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,                                                      // delete
            // CURLOPT_CAINFO         => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer',     // decomment
            CURLOPT_TIMEOUT        => 1
        ]);
        $data = curl_exec($curl);
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null;
        }
        return json_decode($data, true);   // true pour avoir un tableau associatif
    }

}