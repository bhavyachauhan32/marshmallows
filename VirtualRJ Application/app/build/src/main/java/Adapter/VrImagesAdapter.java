package Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;

import com.Image360VrViewer.R;
import com.Image360VrViewer.SimpleVrPanoramaActivity;
import com.squareup.picasso.Picasso;


public class VrImagesAdapter extends RecyclerView.Adapter<VrImagesAdapter.ViewHolder> {

    Context mContext;
    private String[] vrImages;

    public VrImagesAdapter(String[] vrImages, Context Context) {
        this.vrImages = vrImages;
        this.mContext = Context;
    }

    @Override
    public VrImagesAdapter.ViewHolder onCreateViewHolder(ViewGroup viewGroup, int i) {
        // create a new view
        View itemLayoutView = LayoutInflater.from(viewGroup.getContext()).inflate(
                R.layout.item_vr_images_cardview, null);

        // create ViewHolder

        ViewHolder viewHolder = new ViewHolder(itemLayoutView);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final VrImagesAdapter.ViewHolder viewHolder, int position) {

        viewHolder.imageUrl = vrImages[position];

        Picasso.with(mContext).load(viewHolder.imageUrl)
                .into(viewHolder.imgVrImages, new com.squareup.picasso.Callback() {
                    @Override
                    public void onSuccess() {
                        viewHolder.llProgressWheel.setVisibility(View.GONE);
                    }

                    @Override
                    public void onError() {
                    }
                });
    }

    @Override
    public int getItemCount() {
        return vrImages.length;
    }

    // inner class to hold a reference to each item of RecyclerView
    public static class ViewHolder extends RecyclerView.ViewHolder {

        public ImageView imgVrImages;
        public LinearLayout llProgressWheel;
        public String imageUrl;

        public ViewHolder(View itemLayoutView) {
            super(itemLayoutView);

            imgVrImages = (ImageView) itemLayoutView.findViewById(R.id.img_vr_images);
            llProgressWheel = (LinearLayout) itemLayoutView.findViewById(R.id.ll_progress_wheel);

            itemLayoutView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(v.getContext(), SimpleVrPanoramaActivity.class);
                    //Move to vr module 360 from here
                    intent.putExtra("vr_image_url", imageUrl);
                    v.getContext().startActivity(intent);
                }
            });
        }

    }

}