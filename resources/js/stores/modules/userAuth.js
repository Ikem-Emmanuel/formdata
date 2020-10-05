import axios from 'axios';

export default {
    state:{},
    getter:{},
    mutations:{},
    actions:{
        LOGIN: ({commit}, payload) =>{
            return new Promise((resolve, reject) => {
                axios.post(`/api/auth/login`, payload)
                    .then(({data, status})=>{
                        if(status === 200){
                            resolve(true);
                        }
                    })
                    .catch(error=>{
                        reject(error);
                    });
            })
        }
    }
}
