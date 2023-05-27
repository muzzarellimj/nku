package com.kroger.android.interview.hackernews.viewmodels

import android.util.Log
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.kroger.android.interview.hackernews.data.model.Item
import com.kroger.android.interview.hackernews.data.model.TopStoriesResponse
import com.kroger.android.interview.hackernews.data.repository.HackerNewsRepository
import dagger.hilt.android.lifecycle.HiltViewModel
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.StateFlow
import kotlinx.coroutines.launch
import javax.inject.Inject

/**
 * ViewModel for [com.kroger.android.interview.hackernews.MainActivity]
 */
@HiltViewModel
class MainViewModel @Inject constructor(
    private val hackerNewsRepository: HackerNewsRepository
) : ViewModel() {

    private val _topStories = MutableStateFlow<TopStoriesFetchResponse>(TopStoriesFetchResponse.Fetching)
    val topStories: StateFlow<TopStoriesFetchResponse> = _topStories

    fun fetch() {
        viewModelScope.launch {
            when (val response = hackerNewsRepository.fetchTopStories()) {
                is TopStoriesResponse.Success -> {
                    Log.i("MainViewModel", "#fetch response .Success")

                    _topStories.value = TopStoriesFetchResponse.Success(stories = response.stories)
                }

                is TopStoriesResponse.Failure -> {
                    Log.e("MainViewModel", "#fetch response .Failure")

                    _topStories.value = TopStoriesFetchResponse.Failure
                }

                else -> {
                    Log.e("MainViewModel", "#fetch response neither .Success nor .Failure")

                    _topStories.value = TopStoriesFetchResponse.Failure
                }
            }
        }
    }

    sealed class TopStoriesFetchResponse {
        data class Success(
            val stories: List<Item>
        ) : TopStoriesFetchResponse()

        object Fetching : TopStoriesFetchResponse()
        object Failure : TopStoriesFetchResponse()
    }
}
