package dev.muzzarelli.android.recycler

import android.util.Log
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import java.lang.reflect.Field

class GodAdapter(private val gods: List<God>) : RecyclerView.Adapter<GodViewHolder>() {

    private val resources = R.drawable::class.java

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): GodViewHolder = GodViewHolder(
        LayoutInflater.from(parent.context)
            .inflate(R.layout.god_card_view, parent, false)
    )

    override fun getItemCount(): Int = gods.size

    override fun onBindViewHolder(holder: GodViewHolder, position: Int) {
        val god = gods[position]

        try {
            val drawableName: Field = resources.getField(god.image)
            val drawableId: Int = drawableName.getInt(null)

            holder.image.setImageResource(drawableId)
            holder.image.contentDescription = "An image of ${god.name}."

        } catch (e: Exception) {
            Log.w("GodAdapter", "Image asset not found - setting image resource to default.")
            holder.image.setImageResource(R.drawable.gnome_child)
            holder.image.contentDescription = "An unrelated default image of a gnome child."
        }

        holder.name.text = god.name
        holder.tier.text = god.tier
        holder.race.text = god.race
        holder.description.text = god.description
    }
}