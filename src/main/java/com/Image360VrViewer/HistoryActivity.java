package com.Image360VrViewer;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import DTO.PlacesDTO;
import helper.Constants;


public class HistoryActivity extends AppCompatActivity implements Constants {

    TextView tvHistory;
    String history = "";
    ImageView placeImg;
    String picture;
    private PlacesDTO placesDTO;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_history);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        setMainId();

        try {
            Intent getIntent = getIntent();
            placesDTO = (PlacesDTO) getIntent.getExtras().get("place_data");
        } catch (Exception e) {
            e.printStackTrace();
        }

        history = placesDTO.getPlaceHistory();
        //picture = placesDTO.getPlacePictures()[0];

        //picture = (placesDTO.getPlacePictures().length > 0) ? placesDTO.getPlacePictures()[0] : "";

        //or

        picture = placesDTO.getPlaceImageUrl();

        Log.d(TAG, "picture :" + picture);

        tvHistory.setText("" + history);

        Picasso.with(HistoryActivity.this).load(picture)
                .into(placeImg, new com.squareup.picasso.Callback() {
                    @Override
                    public void onSuccess() {

                        Log.d(TAG, "Successfully image load....");

                    }

                    @Override
                    public void onError() {

                        Log.d(TAG, "Can't load image ....");

                    }
                });


        //new GetPlaces().execute();
    }

    private void setMainId() {
        tvHistory = (TextView) findViewById(R.id.tv_place_history);
        placeImg = (ImageView) findViewById(R.id.image_place);
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
    }
}