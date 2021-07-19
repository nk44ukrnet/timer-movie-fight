import React from 'react';
import './VideoItem.css';


const VideoItem = (props) => {
    const video = props.video;
    const onVideoSelect = props.onVideoSelect;
    return (
        <div onClick={() => onVideoSelect(video)} className="item video-item" key={video.id.videoId}>
            <img src={video.snippet.thumbnails.medium.url} alt={video.snippet.title} className="ui image"/>
            <div className="content">
                <h5 className="header">{video.snippet.title}</h5>
            </div>
        </div>
    );
}

export default VideoItem;