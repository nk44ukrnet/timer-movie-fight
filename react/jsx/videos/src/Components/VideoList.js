import React from 'react';
import VideoItem from "./VideoItem";

const VideoList = (props) => {
    //props.videos;
    const onVideoSelect = props.onVideoSelect;
    const renderedList = props.videos.map(video => {
        return <VideoItem key={video.id.videoId} onVideoSelect={onVideoSelect} video={video}/>
    })
    return <div className="ui relaxed divided list">{renderedList}</div>
}

export default VideoList;