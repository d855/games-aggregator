#!/bin/bash

curl 'https://api.igdb.com/v4/games' \
-d 'fields age_ratings,aggregated_rating,aggregated_rating_count,alternative_names,artworks,bundles,category,checksum,collection,cover,created_at,dlcs,expanded_games,expansions,external_games,first_release_date,follows,forks,franchise,franchises,game_engines,game_modes,genres,hypes,involved_companies,keywords,multiplayer_modes,name,parent_game,platforms,player_perspectives,ports,rating,rating_count,release_dates,remakes,remasters,screenshots,similar_games,slug,standalone_expansions,status,storyline,summary,tags,themes,total_rating,total_rating_count,updated_at,url,version_parent,version_title,videos,websites;' \
-H 'Client-ID: lvx8bx341tm02wmkjwc8qesgvq8dhv' \
-H 'Authorization: Bearer efe78u9ta33m1rn6v91rznmjpe3vee' \
-H 'Accept: application/json'
