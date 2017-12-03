package com.Image360VrViewer;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import Adapter.PlaceCardViewDataAdapter;
import DTO.PlacesDTO;
import helper.Constants;
import helper.HttpHandler;

public class PlaceActivity extends AppCompatActivity implements Constants {

    String cityId = "", cityName = "";
    private RecyclerView recyclerView;
    private ArrayList<PlacesDTO> placesList = new ArrayList<>();
    private PlaceCardViewDataAdapter mAdapter;
    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_place);

        // Set toolbar
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        toolbar.setTitle("Place");
        toolbar.setTitleTextColor(Color.WHITE);

        try {

            Intent getIntent = getIntent();
            cityId = (String) getIntent.getExtras().get("cityId");
            cityName = (String) getIntent.getExtras().get("cityName");
            ActionBar actionBar = getSupportActionBar();
            actionBar.setTitle("" + cityName);
            Log.d(TAG, "City id" + cityId);
        } catch (Exception e) {

        }

        setMainId();

        new GetPlaces().execute();
    }

    private void setMainId() {
        recyclerView = (RecyclerView) findViewById(R.id.recycler_view_place);
    }

    /**
     * Async task class to get json by making HTTP call
     */
    private class GetPlaces extends AsyncTask<Void, Void, Void> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
//            Showing progress dialog
            pDialog = new ProgressDialog(PlaceActivity.this);
            pDialog.setMessage("Please wait...");
            pDialog.setCancelable(false);
            pDialog.show();
        }

        @Override
        protected Void doInBackground(Void... arg0) {
            HttpHandler sh = new HttpHandler();

            String[] name = {"cityId"};
            String[] value = {"" + cityId};


            // Making a request to url and getting response
            //String jsonStr = sh.makeServiceCall(PlacesAPI);
            String jsonStr = sh.PostCall(PlacesAPI, name, value);
            Log.e(TAG, "Response from url: " + jsonStr);

            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);

                    // Getting JSON Array node
                    JSONArray category = jsonObj.getJSONArray("places");

                    // looping through All Contacts
                    for (int i = 0; i < category.length(); i++) {

                        JSONObject c = category.getJSONObject(i);
                        String placeId = c.getString("placeId");
                        String placeName = c.getString("placeName");
                        String placeHistory = c.getString("history");
                        String placeVrImages = c.getString("vrImages");
                        String placePictures = c.getString("pictures");
                        String[] placeVrImagesArray = placeVrImages.split(",");
                        String[] placePicturesArray = placePictures.split(",");


                        // Static
//                        String placeHistory = "Maharaja Sawai Jai Singh II, the founder and the ruler of Jaipur city under his resign the fort was personalized. . Construction of the Fort was started by Raja Man Singh I in the year 1592. The Amber fort was built by Raja Man Singh in the 16th century and was completed by Sawai Jai Singh in the 18th ";
//                        String[] placeVrImagesArray = {"https://i.ytimg.com/vi/SavQgEeAwvE/maxresdefault.jpg", "http://indiatourism.ws/jpeg/2012_pano2.jpeg"};
//                        String[] placePictures = {"https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/8173/SITours/3-day-private-golden-triangle-tour-delhi-agra-and-jaipur-in-new-delhi-198411.jpg"};

                        String placeUrl = (placePicturesArray.length > 0) ? placePicturesArray[0] : "";
                        Log.d(TAG, "" + placeUrl);

                        //placeUrl = "" + IP + placeUrl;

                        Log.d(TAG, "New pic:" + placeUrl);
                        // add data
                        PlacesDTO placesDTO = new PlacesDTO(placeId, placeName, placeUrl, placeHistory, placeVrImagesArray, placePicturesArray);
                        placesList.add(placesDTO);
                    }
                } catch (final JSONException e) {
                    Log.e(TAG, "Json parsing error: " + e.getMessage());
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(getApplicationContext(),
                                    "Json parsing error: " + e.getMessage(),
                                    Toast.LENGTH_LONG)
                                    .show();
                        }
                    });

                }
            } else {
                Log.e(TAG, "Couldn't get json from server.");
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(getApplicationContext(),
                                "Couldn't get json from server. Check LogCat for possible errors!",
                                Toast.LENGTH_LONG)
                                .show();
                    }
                });
            }

            return null;
        }

        @Override
        protected void onPostExecute(Void result) {
            super.onPostExecute(result);

            if (pDialog.isShowing())
                pDialog.dismiss();

            LinearLayoutManager layoutManager = new LinearLayoutManager(PlaceActivity.this);
            layoutManager.setOrientation(LinearLayoutManager.VERTICAL);

            recyclerView.setHasFixedSize(true);
            // ListView
            recyclerView.setLayoutManager(new GridLayoutManager(PlaceActivity.this, 2));
            // create an Object for Adapter
            mAdapter = new PlaceCardViewDataAdapter(placesList, PlaceActivity.this);
            // set the adapter object to the Recyclerview
            recyclerView.setAdapter(mAdapter);
        }

    }

}