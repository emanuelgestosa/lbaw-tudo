window.SERVER = process.env.MIX_SENTRY_DSN_PUBLIC
export const sendRequest = async (url,options)=>{ 
    console.log("Send Request Called")
    const fullUrl = new URL(window.SERVER+url) 
    console.log(fullUrl)
    if(options.method === "GET"){
        fullUrl.search = new URLSearchParams(options.params).toString();
    }
    const response = await fetch(fullUrl,options)
    return response
}
