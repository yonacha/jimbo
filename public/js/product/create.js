if( {!! json_encode($flag)!!} === "createdNewProduct"){
    console.log("testtt");
    $.notify({
        message: 'The product has been created!'
    },{
        type:'success',
        placement:{
            from:'top',
            align:'center'
        },
        delay: 1500,
    })
}
