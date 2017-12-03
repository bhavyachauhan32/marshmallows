package DTO;

import java.io.Serializable;

public class PlacesDTO implements Serializable {

    private String placeId, placeName, placeImageUrl, placeHistory;

    private String[] placeVRImages;
    private String[] placePictures;

    public PlacesDTO(String placeId, String placeName, String placeImageUrl, String placeHistory, String[] placeVRImages, String[] placePictures) {
        this.placeId = placeId;
        this.placeName = placeName;
        this.placeImageUrl = placeImageUrl;
        this.placeHistory = placeHistory;
        this.placeVRImages = placeVRImages;
        this.placePictures = placePictures;
    }

    public String getPlaceId() {
        return placeId;
    }

    public void setPlaceId(String placeId) {
        this.placeId = placeId;
    }

    public String getPlaceName() {
        return placeName;
    }

    public void setPlaceName(String placeName) {
        this.placeName = placeName;
    }

    public String getPlaceImageUrl() {
        return placeImageUrl;
    }

    public String getPlaceHistory() {
        return placeHistory;
    }

    public String[] getPlaceVRImages() {
        return placeVRImages;
    }

    public String[] getPlacePictures() {
        return placePictures;
    }
}