package com.kroger.android.interview.hackernews.data.repository

import android.util.Log
import com.kroger.android.interview.hackernews.data.model.Item
import com.kroger.android.interview.hackernews.data.model.ItemResponse
import com.kroger.android.interview.hackernews.data.model.TopStoriesResponse
import com.kroger.android.interview.hackernews.network.HackerNewsService
import javax.inject.Inject

class HackerNewsRepositoryImpl @Inject constructor(
    private val service: HackerNewsService
) : HackerNewsRepository {

    override suspend fun fetchTopStories(): TopStoriesResponse {
        val response = service.fetchTopStories()

        if (!response.isSuccessful) {
            return TopStoriesResponse.Failure
        }

        val body = response.body()

        return if (body !== null) {
            fetchTopStoriesDeep(body)
        } else {
            TopStoriesResponse.Failure
        }
    }

    private suspend fun fetchTopStoriesDeep(ids: List<Int>): TopStoriesResponse {
        val stories = mutableListOf<Item>()

        // deep fetch 20 top stories
        for (i in 0..19) {
            val response = service.fetchItem(ids[i])

            if (!response.isSuccessful) {
                Log.i("HackerNewsRepositoryImpl", "#fetchTopStoriesDeep response .Failure")
            }

            val body = response.body()

            if (body !== null) {
                stories.add(body)
            }
        }

        return if (stories.size > 0) {
            TopStoriesResponse.Success(stories)
        } else {
            TopStoriesResponse.Failure
        }
    }

    override suspend fun fetchItem(id: Int): ItemResponse {
        val response = service.fetchItem(id)

        if (!response.isSuccessful) {
            return ItemResponse.Failure
        }

        val body = response.body()

        return if (body !== null) {
            ItemResponse.Success(body)
        } else {
            ItemResponse.Failure
        }
    }
}