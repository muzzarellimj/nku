package com.kroger.android.interview.hackernews.data.repository

import com.kroger.android.interview.hackernews.data.model.ItemResponse
import com.kroger.android.interview.hackernews.data.model.TopStoriesResponse

interface HackerNewsRepository {

    suspend fun fetchTopStories(): TopStoriesResponse

    suspend fun fetchItem(
        id: Int
    ): ItemResponse
}