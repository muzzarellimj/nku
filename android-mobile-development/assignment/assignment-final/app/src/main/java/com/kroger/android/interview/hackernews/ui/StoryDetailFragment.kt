package com.kroger.android.interview.hackernews.ui

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.os.bundleOf
import androidx.fragment.app.Fragment
import com.kroger.android.interview.hackernews.data.model.Item
import com.kroger.android.interview.hackernews.databinding.FragmentStoryDetailBinding
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class StoryDetailFragment : Fragment() {

    private var _binding: FragmentStoryDetailBinding? = null
    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentStoryDetailBinding.inflate(inflater, container, false)

        val story: Item? = requireArguments().getParcelable("story")

        if (story !== null) {
            binding.storyTitle.text = story.title
            binding.storyAuthor.text = "@${story.by}"
            binding.storyLink.setOnClickListener {
                val intent = Intent(Intent.ACTION_VIEW, Uri.parse(story.url))

                startActivity(intent)
            }
        }

        return binding.root
    }

    companion object {
        fun newInstance(story: Item) = StoryDetailFragment().apply {
            arguments = bundleOf(
                "story" to story
            )
        }
    }
}