package DTO;

public class CityDTO {
    private String cityId, city;

    public CityDTO(String cityId, String city) {
        this.cityId = cityId;
        this.city = city;
    }

    public String getCityId() {
        return cityId;
    }

    public void setCityId(String cityId) {
        this.cityId = cityId;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }
}