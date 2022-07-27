#TAL THEME


#INSTALL PAKCAGES

```
...  npm i tw-elements

Configure tailwind.config.js

module.exports = {
    content: [
        ...
       './node_modules/tw-elements/dist/js/**/*.js'],
    plugins: [
        ...
        require('tw-elements/dist/plugin')
    ]
}


```


#PUBLISHS

```
artisan vendor:publish --tag=theme-img

```