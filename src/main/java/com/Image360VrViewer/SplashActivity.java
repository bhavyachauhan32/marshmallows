package com.Image360VrViewer;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import DTO.CityDTO;
import helper.Constants;
import helper.HttpHandler;


public class SplashActivity extends AppCompatActivity implements Constants {


    public static ArrayList<CityDTO> cityList = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);

        new GetCategories().execute();

    }

    /**
     * Async task class to get json by making HTTP call
     */
    private class GetCategories extends AsyncTask<Void, Void, Void> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Showing progress dialog
//            pDialog = new ProgressDialog(MainActivity.this);
//            pDialog.setMessage("Please wait...");
//            pDialog.setCancelable(false);
//            pDialog.show();
        }

        @Override
        protected Void doInBackground(Void... arg0) {
            HttpHandler sh = new HttpHandler();

            // Making a request to url and getting response
            String jsonStr = sh.makeServiceCall(CityAPI);
            Log.e(TAG, "Response from url: " + jsonStr);

            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);

                    // Getting JSON Array node
                    JSONArray category = jsonObj.getJSONArray("cities");

                    // looping through All Contacts
                    for (int i = 0; i < category.length(); i++) {

                        JSONObject c = category.getJSONObject(i);

                        String cityId = c.getString("cityId");
                        String city = c.getString("cityName");

                        CityDTO cityDto = new CityDTO(cityId, city);

                        cityList.add(cityDto);
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


            new Handler().postDelayed(new Runnable() {
                @Override
                public void run() {

                    Intent intentToMain = new Intent(SplashActivity.this,
                            MainActivity.class);
                    startActivity(intentToMain);
                    overridePendingTransition(R.anim.zoom_enter,
                            R.anim.zoom_exit);
                    finish();
                }
            }, 1500);

        }

    }

}