package com.Image360VrViewer;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;

import Adapter.VrImagesAdapter;
import DTO.PlacesDTO;
import helper.Constants;

public class VRImagesActivity extends AppCompatActivity implements Constants {

    private RecyclerView recyclerView;
    private String[] vrImages;
    private VrImagesAdapter mAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vr_images);

        // Set toolbar
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle("VR Images");
        toolbar.setTitleTextColor(Color.WHITE);

        setMainId();

        try {
            Intent getIntent = getIntent();
            PlacesDTO placesDTO = (PlacesDTO) getIntent.getExtras().get("place_data");

            vrImages = placesDTO.getPlaceVRImages();
        } catch (Exception e) {
            e.printStackTrace();
        }

        if (vrImages.length > 0) {
            LinearLayoutManager layoutManager = new LinearLayoutManager(VRImagesActivity.this);
            layoutManager.setOrientation(LinearLayoutManager.VERTICAL);

            recyclerView.setHasFixedSize(true);
            // ListView
            recyclerView.setLayoutManager(new LinearLayoutManager(VRImagesActivity.this));
            // create an Object for Adapter
            mAdapter = new VrImagesAdapter(vrImages, VRImagesActivity.this);
            // set the adapter object to the Recyclerview
            recyclerView.setAdapter(mAdapter);
        }
    }

    private void setMainId() {
        recyclerView = (RecyclerView) findViewById(R.id.recycler_view_vr_images);
    }

}
