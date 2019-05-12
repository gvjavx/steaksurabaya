package com.ryzananda.steaksurabaya.remote;

import com.ryzananda.steaksurabaya.model.ResObj;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Path;

public interface UserService {

    @GET("login/(username)/(password)")
    Call<ResObj> login(@Path("username")String username, @Path("password") String password);
}
