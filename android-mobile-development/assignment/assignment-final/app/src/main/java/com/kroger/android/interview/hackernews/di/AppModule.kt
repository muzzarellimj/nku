package com.kroger.android.interview.hackernews.di

import com.kroger.android.interview.hackernews.network.HackerNewsService
import dagger.Module
import dagger.Provides
import dagger.hilt.InstallIn
import dagger.hilt.components.SingletonComponent
import retrofit2.Retrofit
import retrofit2.converter.moshi.MoshiConverterFactory
import retrofit2.create
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
object AppModule {

    @Provides
    @Singleton
    fun providesHackerNewsService(): HackerNewsService =
        Retrofit.Builder()
            .baseUrl("https://hacker-news.firebaseio.com/")
            .addConverterFactory(MoshiConverterFactory.create())
            .build()
            .create()
}