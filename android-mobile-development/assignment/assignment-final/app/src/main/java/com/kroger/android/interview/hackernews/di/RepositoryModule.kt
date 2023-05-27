package com.kroger.android.interview.hackernews.di

import com.kroger.android.interview.hackernews.data.repository.HackerNewsRepository
import com.kroger.android.interview.hackernews.data.repository.HackerNewsRepositoryImpl
import dagger.Binds
import dagger.Module
import dagger.hilt.InstallIn
import dagger.hilt.components.SingletonComponent
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
abstract class RepositoryModule {

    @Binds
    @Singleton
    abstract fun bindHackerNewsRepository(
        repository: HackerNewsRepositoryImpl
    ): HackerNewsRepository
}