var editor = grapesjs.init( {
    container : '#gjs',
    components: '<div class="txt-red">Hello world!</div>',
    style: '.txt-red{color: red}',
    plugins: [
        'gjs-preset-webpage',
        'grapesjs-lory-slider'
    ],
    pluginsOpts: {
        'gjs-preset-webpage' : {}
    }
} );

console.log("test");