package com.kroger.android.interview.hackernews.network

import com.kroger.android.interview.hackernews.data.model.Item
import retrofit2.Response
import retrofit2.http.GET
import retrofit2.http.Path

/**
 * Retrofit service for the Hacker News API
 *
 * https://github.com/HackerNews/API
 */

interface HackerNewsService {

    @GET("v0/topstories.json")
    suspend fun fetchTopStories(): Response<List<Int>>

    @GET("v0/item/{id}.json")
    suspend fun fetchItem(
        @Path("id") id: Int
    ): Response<Item>
}
