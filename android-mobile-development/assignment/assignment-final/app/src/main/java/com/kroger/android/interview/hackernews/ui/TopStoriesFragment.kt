package com.kroger.android.interview.hackernews.ui

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import androidx.fragment.app.Fragment
import androidx.fragment.app.activityViewModels
import androidx.fragment.app.commit
import androidx.lifecycle.lifecycleScope
import androidx.recyclerview.widget.LinearLayoutManager
import com.kroger.android.interview.hackernews.R
import com.kroger.android.interview.hackernews.databinding.FragmentStoriesRecyclerBinding
import com.kroger.android.interview.hackernews.ui.adapter.StoryAdapter
import com.kroger.android.interview.hackernews.viewmodels.MainViewModel
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.launch

@AndroidEntryPoint
class TopStoriesFragment : Fragment() {

    private var _binding: FragmentStoriesRecyclerBinding? = null
    private val binding get() = _binding!!

    private val viewModel: MainViewModel by activityViewModels()

    private val storyAdapter = StoryAdapter { story, _ ->
        requireActivity().supportFragmentManager.commit {
            setReorderingAllowed(true)
            replace(
                R.id.fragment_container_view,
                StoryDetailFragment.newInstance(story = story)
            )
            addToBackStack(null)
        }
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentStoriesRecyclerBinding.inflate(inflater, container, false)
        setupObservers()
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        binding.recyclerView.apply {
            layoutManager = LinearLayoutManager(requireContext())
            adapter = storyAdapter
        }

        viewModel.fetch()
    }

    override fun onDestroy() {
        super.onDestroy()
        _binding = null
    }

    private fun setupObservers() {
        lifecycleScope.launch {
            viewModel.topStories.collect { event ->
                when (event) {
                    is MainViewModel.TopStoriesFetchResponse.Fetching -> {
                        binding.progressBar.isVisible = true
                        binding.recyclerView.isVisible = false
                        binding.errorMessage.isVisible = false
                    }

                    is MainViewModel.TopStoriesFetchResponse.Failure -> {
                        binding.progressBar.isVisible = false
                        binding.recyclerView.isVisible = false
                        binding.errorMessage.isVisible = true
                    }

                    is MainViewModel.TopStoriesFetchResponse.Success -> {
                        storyAdapter.refresh(event.stories)

                        binding.progressBar.isVisible = false
                        binding.errorMessage.isVisible = false
                        binding.recyclerView.isVisible = true
                    }
                }
            }
        }
    }
}