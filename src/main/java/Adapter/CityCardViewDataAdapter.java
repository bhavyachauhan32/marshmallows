package Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.Image360VrViewer.PlaceActivity;
import com.Image360VrViewer.R;

import java.util.ArrayList;

import DTO.CityDTO;

public class CityCardViewDataAdapter extends RecyclerView.Adapter<CityCardViewDataAdapter.ViewHolder> {

    private static ArrayList<CityDTO> dataSet;
    Context mContext;

    public CityCardViewDataAdapter(ArrayList<CityDTO> city_list, Context Context) {

        dataSet = city_list;
        mContext = Context;
    }

    @Override
    public CityCardViewDataAdapter.ViewHolder onCreateViewHolder(ViewGroup viewGroup, int i) {
// create a new view
        View itemLayoutView = LayoutInflater.from(viewGroup.getContext()).inflate(
                R.layout.item_city_cardview, null);

        // create ViewHolder

        ViewHolder viewHolder = new ViewHolder(itemLayoutView);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final CityCardViewDataAdapter.ViewHolder viewHolder, int i) {

        //FeddProperties fp = dataSet.get(i);
        CityDTO cdto = dataSet.get(i);

        viewHolder.cityName.setText(cdto.getCity());

        viewHolder.feedDto = cdto;
    }

    @Override
    public int getItemCount() {
        return dataSet.size();
    }

    // inner class to hold a reference to each item of RecyclerView
    public static class ViewHolder extends RecyclerView.ViewHolder {

        public TextView cityName;

        //public FeddProperties feed;
        public CityDTO feedDto;

        public ViewHolder(View itemLayoutView) {
            super(itemLayoutView);

            cityName = (TextView) itemLayoutView
                    .findViewById(R.id.cityName);

            itemLayoutView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    String cityArray[] = {feedDto.getCity(), feedDto.getCityId()};
                    Intent intent = new Intent(v.getContext(), PlaceActivity.class);
                    intent.putExtra("SelectedCity", cityArray);
                    intent.putExtra("cityId", "" + feedDto.getCityId());
                    intent.putExtra("cityName", "" + feedDto.getCity());
                    v.getContext().startActivity(intent);
                    Toast.makeText(v.getContext(), "Selected city: " + feedDto.getCity() + "Selected ID:" + feedDto.getCityId(), Toast.LENGTH_SHORT).show();
                }
            });


        }

    }


}

