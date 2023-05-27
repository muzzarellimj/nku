package com.example.pokepose.di

import com.example.pokepose.data.repository.PokeApiRepository
import com.example.pokepose.data.repository.PokeApiRepositoryImpl
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
    abstract fun bindPokeApiRepository(
        repository: PokeApiRepositoryImpl
    ): PokeApiRepository
}