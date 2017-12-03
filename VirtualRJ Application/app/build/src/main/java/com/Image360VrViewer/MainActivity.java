package com.Image360VrViewer;

import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;

import java.util.ArrayList;

import Adapter.CityCardViewDataAdapter;
import DTO.CityDTO;
import helper.Constants;

public class MainActivity extends AppCompatActivity implements Constants {

    private RecyclerView recyclerView;
    private RecyclerView.LayoutManager mLayoutManager;
    private CardView cardView;
    private ArrayList<CityDTO> cityList = new ArrayList<>();
    private RecyclerView.Adapter mAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Set toolbar
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle("Rajasthan Guide");
        toolbar.setTitleTextColor(Color.WHITE);

        setMainId();

        Log.d(TAG, "In Main Activity.....First");

        cityList = SplashActivity.cityList;

        Log.d(TAG, "In Main Activity.....After object get");

        //////
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle(getString(R.string.Home));

        LinearLayoutManager layoutManager = new LinearLayoutManager(MainActivity.this);
        layoutManager.setOrientation(LinearLayoutManager.VERTICAL);

        recyclerView.setHasFixedSize(true);

        // ListView
//        recyclerView.setLayoutManager(new LinearLayoutManager(MainActivity.this));


        //Grid View
        recyclerView.setLayoutManager(new GridLayoutManager(MainActivity.this, 2, 1, false));

        //StaggeredGridView
        //recyclerView.setLayoutManager(new StaggeredGridLayoutManager(2,1));

        Log.d(TAG, "Cities====>" + cityList);
        // create an Object for Adapter
        mAdapter = new CityCardViewDataAdapter(cityList, MainActivity.this);
        Log.d(TAG, "adapter====>" + mAdapter);
        // set the adapter object to the Recyclerview
        recyclerView.setAdapter(mAdapter);
    }

    private void setMainId() {
        recyclerView = (RecyclerView) findViewById(R.id.my_recycler_view);
    }
}
