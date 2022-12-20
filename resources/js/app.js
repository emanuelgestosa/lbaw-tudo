window.SERVER = process.env.MIX_SENTRY_DSN_PUBLIC
export const sendRequest = async (url,options)=>{ 
    const fullUrl = new URL(window.SERVER+url) 
    if(options.method === "GET"){
        fullUrl.search = new URLSearchParams(options.params).toString();
    }
    const response = await fetch(fullUrl,options)
    return response
}
