let head1=document.getElementById("head-1")
let head2=document.getElementById("head-2")

let hi=()=>{head1.innerHTML+="<h5>hi</h5>";}

let cal=()=>{
    let webworker= new Worker('worker.js');
    webworker.postMessage("start worker");
    webworker.onmessage=(e)=>{
        head2.innerHTML+=e.data;
    }
}