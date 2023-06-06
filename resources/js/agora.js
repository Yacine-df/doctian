import AgoraRTC from "agora-rtc-sdk-ng"
import { random } from "lodash";

console.log(app);
let options =
{
    // Pass your App ID here.
    appId: '',
    // Set the channel name.
    channel: '',
    // Pass your temp token here.
    token: '',
    // Set the user ID.
    uid: Math.floor(Math.random() * 100),
};


Echo.channel('appointments.13')
        .listen('SendVideoChatInformations', (e) => {
            try {  
                options.appId = e.appID;
                options.channel = e.channelName;
                options.token = e.token;
                options.uid = Math.floor(Math.random() * 100);
                console.log(options);
            } catch (error) {
                console.log(error)
            }
});

function agoraToken(jsonData){
    try {  
        options.appId = jsonData.appId;
        options.channel = jsonData.channelName;
        options.token = jsonData.token;
        options.uid = jsonData.uid
    } catch (error) {
        console.log(error)
    }
}



let channelParameters =
{
    // A variable to hold a local audio track.
    localAudioTrack: null,
    // A variable to hold a local video track.
    localVideoTrack: null,
    // A variable to hold a remote audio track.
    remoteAudioTrack: null,
    // A variable to hold a remote video track.
    remoteVideoTrack: null,
    // A variable to hold the remote user id.s
    remoteUid: null,
};
async function startBasicCall()
{

// Create an instance of the Agora Engine

const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
// Dynamically create a container in the form of a DIV element to play the remote video track.
const remotePlayerContainer = document.createElement("div");
// Dynamically create a container in the form of a DIV element to play the local video track.
const localPlayerContainer = document.createElement('div');
//get container 
const container = document.getElementById('container');
//get join and leave btns
const join = document.getElementById('join');
const leave = document.getElementById('leave');
// Specify the ID of the DIV container. You can use the uid of the local user.
localPlayerContainer.id = options.uid;
console.log(localPlayerContainer.id)
// Set the textContent property of the local video container to the local user id.
//localPlayerContainer.textContent = "Local user " + options.uid;
// Set the local video container size.
localPlayerContainer.style.width = "112px";
localPlayerContainer.style.height = "96px";
localPlayerContainer.style.padding = "15px 5px 5px 5px";
localPlayerContainer.style.borderRadius = "0.25rem";
localPlayerContainer.style.position = "absolute";
localPlayerContainer.style.left = "8px";
localPlayerContainer.style.top = "60px";
localPlayerContainer.style.zIndex = "40";
// Set the remote video container size.
remotePlayerContainer.style.width = "100%";
remotePlayerContainer.style.height = "600px";
remotePlayerContainer.style.padding = "15px 5px 5px 5px";

// Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
agoraEngine.on("user-published", async (user, mediaType) =>
{
// Subscribe to the remote user when the SDK triggers the "user-published" event.
await agoraEngine.subscribe(user, mediaType);
console.log("subscribe success");
// Subscribe and play the remote video in the container If the remote user publishes a video track.
if (mediaType == "video")
{
    // Retrieve the remote video track.
    channelParameters.remoteVideoTrack = user.videoTrack;
    // Retrieve the remote audio track.
    channelParameters.remoteAudioTrack = user.audioTrack;
    // Save the remote user id for reuse.
    channelParameters.remoteUid = user.uid.toString();
    // Specify the ID of the DIV container. You can use the uid of the remote user.
    remotePlayerContainer.id = user.uid.toString();
    channelParameters.remoteUid = user.uid.toString();
    //remotePlayerContainer.textContent = "Remote user " + user.uid.toString();
    // Append the remote container to the page body.
    container.append(remotePlayerContainer);

    join.style.cursor = 'not-allowed';
    join.style.backgroundColor = 'rgb(187 247 208 / var(--tw-bg-opacity))';
    leave.style.cursor = 'pointer';
    leave.style.backgroundColor = 'rgb(239 68 68 / var(--tw-bg-opacity))';
    // Play the remote video track.
    channelParameters.remoteVideoTrack.play(remotePlayerContainer);
}
// Subscribe and play the remote audio track If the remote user publishes the audio track only.
if (mediaType == "audio")
{
    // Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
    channelParameters.remoteAudioTrack = user.audioTrack;
    // Play the remote audio track. No need to pass any DOM element.
    channelParameters.remoteAudioTrack.play();
}
// Listen for the "user-unpublished" event.
agoraEngine.on("user-unpublished", user =>
{
    console.log(user.uid+ "has left the channel");
});
    });
window.onload = function ()
{
    // Listen to the Join button click event.
    document.getElementById("join").onclick = async function ()
    {
        // Join a channel.
        await agoraEngine.join(options.appId, options.channel, options.token, options.uid);
        // Create a local audio track from the audio sampled by a microphone.
        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
        // Create a local video track from the video captured by a camera.
        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
        // Append the local video container to the page body.
        container.append(localPlayerContainer);

        // Publish the local audio and video tracks in the channel.
        await agoraEngine.publish([channelParameters.localAudioTrack, channelParameters.localVideoTrack]);
        // Play the local video track.
        channelParameters.localVideoTrack.play(localPlayerContainer);
        console.log("publish success!");
    }
    // Listen to the Leave button click event.
    document.getElementById('leave').onclick = async function ()
    {
        // Destroy the local audio and video tracks.
        channelParameters.localAudioTrack.close();
        channelParameters.localVideoTrack.close();
        // Remove the containers you created for the local video and remote video.
        removeVideoDiv(remotePlayerContainer.id);
        removeVideoDiv(localPlayerContainer.id);
        // Leave the channel
        await agoraEngine.leave();
        console.log("You left the channel");
        // Refresh the page for reuse
        window.location.reload();
    }
}
}
startBasicCall();
// Remove the video stream from the container.
function removeVideoDiv(elementId)
{
    console.log("Removing "+ elementId+"Div");
    let Div = document.getElementById(elementId);
    if (Div)
    {
        Div.remove();
    }
};
