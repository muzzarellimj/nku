package com.kroger.android.interview.hackernews.network.local

import com.kroger.android.interview.hackernews.data.model.Item
import com.kroger.android.interview.hackernews.network.HackerNewsService
import retrofit2.Response

/**
 * If Hacker News API is down or we want to start with a dummy data set, substitute the retrofit
 * instance of this interface.
 * IOW, set the USE_LOCAL_DATA BuildConfig property to true.
 */
class LocalHackerNewsService(private val fileLoader: KrogerFileLoader) : HackerNewsService {
    override suspend fun fetchTopStories(): Response<List<Int>> {
        TODO("Not yet implemented")
    }

    override suspend fun fetchItem(id: Int): Response<Item> {
        TODO("Not yet implemented")
    }
}
