package com.kroger.android.interview.hackernews.ui.adapter

import android.annotation.SuppressLint
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.kroger.android.interview.hackernews.data.model.Item
import com.kroger.android.interview.hackernews.databinding.StoryCardViewBinding

class StoryAdapter(
    private val onItemClick: (story: Item, adapterPosition: Int) -> Unit
) : RecyclerView.Adapter<StoryAdapter.StoryViewHolder>() {

    init {
        setHasStableIds(true)
    }

    private val _stories = mutableListOf<Item>()

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): StoryViewHolder {
        val layoutInflater = LayoutInflater.from(parent.context)
        val binding = StoryCardViewBinding.inflate(layoutInflater, parent, false)
        return StoryViewHolder(binding) { position ->
            onItemClick(_stories[position], position)
        }
    }

    override fun getItemCount(): Int = _stories.size

    override fun onBindViewHolder(holder: StoryViewHolder, position: Int) {
        val story = _stories[position]

        holder.bind(story)
    }

    @SuppressLint("NotifyDataSetChanged")
    fun refresh(stories: List<Item>) {
        _stories.clear()
        _stories.addAll(stories)
        notifyDataSetChanged()
    }

    inner class StoryViewHolder(
        private val binding: StoryCardViewBinding,
        private val onItemClick: (adapterPosition: Int) -> Unit
    ) : RecyclerView.ViewHolder(binding.root) {

        init {
            itemView.setOnClickListener {
                onItemClick(adapterPosition)
            }
        }

        fun bind(story: Item) {
            Glide
                .with(binding.root)
                .load("https://ui-avatars.com/api/?background=random&name=${story.by}&size=64")
                .into(binding.avatar)

            binding.storyTitle.text = story.title
            binding.storyAuthor.text = "@${story.by}"
        }
    }
}