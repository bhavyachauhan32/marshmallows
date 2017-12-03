package com.Image360VrViewer;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.view.View;

import DTO.PlacesDTO;
import helper.Constants;


public class SelectOptionActivity extends AppCompatActivity implements Constants {

    private CardView cardViewVrImages, cardViewPicture, cardViewHistory;
    private PlacesDTO placesDTO;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_select_option);

        setMainId();

        try {
            Intent getIntent = getIntent();
            placesDTO = (PlacesDTO) getIntent.getExtras().get("place_data");
        } catch (Exception e) {
            e.printStackTrace();
        }

        cardViewVrImages.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getApplicationContext(), VRImagesActivity.class);
                intent.putExtra("place_data", placesDTO);
                startActivity(intent);
            }
        });


        cardViewHistory.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Intent intent = new Intent(getApplicationContext(), HistoryActivity.class);
                Intent intent = new Intent(getApplicationContext(), HistoryActivity.class);
                intent.putExtra("place_data", placesDTO);
                startActivity(intent);
            }
        });

    }

    private void setMainId() {
        cardViewVrImages = (CardView) findViewById(R.id.card_view_vr_images);
        //cardViewPicture = (CardView) findViewById(R.id.card_view_picture);
        cardViewHistory = (CardView) findViewById(R.id.card_view_history);
    }
}
