package Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.Image360VrViewer.R;
import com.Image360VrViewer.SelectOptionActivity;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

import DTO.PlacesDTO;

public class PlaceCardViewDataAdapter extends RecyclerView.Adapter<PlaceCardViewDataAdapter.ViewHolder> {

    private static ArrayList<PlacesDTO> dataSet;
    Context mContext;

    public PlaceCardViewDataAdapter(ArrayList<PlacesDTO> city_list, Context Context) {
        dataSet = city_list;
        mContext = Context;
    }

    @Override
    public PlaceCardViewDataAdapter.ViewHolder onCreateViewHolder(ViewGroup viewGroup, int i) {
        // create a new view
        View itemLayoutView = LayoutInflater.from(viewGroup.getContext()).inflate(
                R.layout.item_place_cardview, null);

        // create ViewHolder

        ViewHolder viewHolder = new ViewHolder(itemLayoutView);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final PlaceCardViewDataAdapter.ViewHolder viewHolder, int i) {

        //FeddProperties fp = dataSet.get(i);
        PlacesDTO placesDTO = dataSet.get(i);

        viewHolder.tvPlaceName.setText(placesDTO.getPlaceName());

        Picasso.with(mContext).load(placesDTO.getPlaceImageUrl())
                .into(viewHolder.imgPlace, new com.squareup.picasso.Callback() {
                    @Override
                    public void onSuccess() {
                    }

                    @Override
                    public void onError() {

                    }
                });


        viewHolder.placesDTO = placesDTO;
    }

    @Override
    public int getItemCount() {
        return dataSet.size();
    }

    // inner class to hold a reference to each item of RecyclerView
    public static class ViewHolder extends RecyclerView.ViewHolder {

        public TextView tvPlaceName;
        public ImageView imgPlace;

        //public FeddProperties feed;
        public PlacesDTO placesDTO;

        public ViewHolder(View itemLayoutView) {
            super(itemLayoutView);

            tvPlaceName = (TextView) itemLayoutView.findViewById(R.id.tv_place_name);
            imgPlace = (ImageView) itemLayoutView.findViewById(R.id.img_place);

            itemLayoutView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(v.getContext(), SelectOptionActivity.class);
                    intent.putExtra("place_data", placesDTO);
                    v.getContext().startActivity(intent);
                }
            });
        }

    }


}

