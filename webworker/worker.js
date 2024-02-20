onmessage=(e)=>{
    let result=0;
    for(let i=0;i<276632;i++){
        result+=i;
    }
    postMessage(result)
}
