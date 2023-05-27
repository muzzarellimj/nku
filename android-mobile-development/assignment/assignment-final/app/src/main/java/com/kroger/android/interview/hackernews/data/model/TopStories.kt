package com.kroger.android.interview.hackernews.data.model

sealed class TopStoriesResponse {
    data class Success(
        val stories: List<Item>
    ) : TopStoriesResponse()

    object Fetching : TopStoriesResponse()
    object Failure : TopStoriesResponse()
}