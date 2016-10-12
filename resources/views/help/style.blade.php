<style>
    progress, sub, sup {
        vertical-align: baseline
    }

    button, hr, input {
        overflow: visible
    }

    html {
        font-family: sans-serif;
        line-height: 1.15;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    figcaption, menu, article, aside, details, figure, footer, header, main, nav, section, summary {
        display: block
    }

    audio, canvas, progress, video {
        display: inline-block
    }

    audio:not([controls]) {
        display: none;
        height: 0
    }

    [hidden], template {
        display: none
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects
    }

    a:active, a:hover {
        outline-width: 0
    }

    abbr[title] {
        border-bottom: none;
        text-decoration: underline;
        text-decoration: underline dotted
    }

    b, strong {
        font-weight: bolder
    }

    dfn {
        font-style: italic
    }

    h1 {
        font-size: 2em;
        margin: .67em 0
    }

    mark {
        background-color: #ff0;
        color: #000
    }

    small {
        font-size: 80%
    }

    sub, sup {
        font-size: 75%;
        line-height: 0;
        position: relative
    }

    sub {
        bottom: -.25em
    }

    sup {
        top: -.5em
    }

    img {
        border-style: none
    }

    svg:not(:root) {
        overflow: hidden
    }

    code, kbd, pre, samp {
        font-family: monospace, monospace;
        font-size: 1em
    }

    figure {
        margin: 1em 40px
    }

    hr {
        box-sizing: content-box;
        height: 0
    }

    button, input, optgroup, select, textarea {
        font: inherit;
        margin: 0
    }

    optgroup {
        font-weight: 700
    }

    button, input {
    }

    button, select {
        text-transform: none
    }

    [type=submit], [type=reset], button, html [type=button] {
        -webkit-appearance: button
    }

    [type=button]::-moz-focus-inner, [type=reset]::-moz-focus-inner, [type=submit]::-moz-focus-inner, button::-moz-focus-inner {
        border-style: none;
        padding: 0
    }

    [type=button]:-moz-focusring, [type=reset]:-moz-focusring, [type=submit]:-moz-focusring, button:-moz-focusring {
        outline: ButtonText dotted 1px
    }

    fieldset {
        border: 1px solid silver;
        margin: 0 2px;
        padding: .35em .625em .75em
    }

    legend {
        box-sizing: border-box;
        color: inherit;
        display: table;
        max-width: 100%;
        padding: 0;
        white-space: normal
    }

    textarea {
        overflow: auto
    }

    [type=checkbox], [type=radio] {
        box-sizing: border-box;
        padding: 0
    }

    [type=number]::-webkit-inner-spin-button, [type=number]::-webkit-outer-spin-button {
        height: auto
    }

    [type=search] {
        -webkit-appearance: textfield;
        outline-offset: -2px
    }

    [type=search]::-webkit-search-cancel-button, [type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-input-placeholder {
        color: inherit;
        opacity: .54
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    html {
        font-family: 'Open Sans', sans-serif;
    }

    .headline-wrapper {
        height: 480px;
        background: #f07066 url("/images/robo.svg") 50% 90px no-repeat;
        background-size: 340px;
    }

    .headline {
        display: block;
        height: 80px;
        background: #fff;
        padding: 0 18.5714285714%;
    }

    .headline__item {
        display: inline-block;
        height: 80px;
        width: auto;
    }

    .headline__left {
        float: left;
    }

    .headline-logo {
        vertical-align: middle;
    }

    .headline-logo__link {
        display: inline-block;
        line-height: 80px;
        height: 80px;
    }

    .headline__right {
        float: right;
    }

    .headline__bar {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .headline__bar-item {
        display: inline-block;
        margin-left: 45px;
        height: 80px;
        line-height: 80px;
    }

    .headline__bar-item:first-child {
        margin-left: 0;
    }

    .headline__bar-link {
        text-decoration: none;
        color: #333333;
        display: inline-block;
    }

    .headline__bar-link:hover,
    .headline__bar-link:active,
    .headline__bar-item_active {
        cursor: pointer;
        color: #ec4e42;
        border-bottom: 2px solid #ec4e42;
        height: 78px;
    }

    fieldset {
        border: none;
        margin: 50px 0 0;
        padding: 0;
    }

    fieldset:first-child {
        margin: 0;
    }

    legend {
        font-weight: bold;
        margin-bottom: 16px;
    }

    .content-wrapper {
        padding: 40px;
        display: block;
        width: 42.8571428571%;
        margin: -100px auto 0;
        margin-bottom: 200px;
        margin-bottom: 30vh;
        background-color: #fff;
    }

    .help-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .help-list .help-list {
        padding: 15px 0 5px 40px;
    }

    .help-list__item {
        display: block;
        margin-top: 10px;
    }

    .help-list__item:first-child {
        margin-top: 0;
    }

    .styled-box {
        opacity: 0;
        outline: none;
        position: absolute;
    }

    .styled-box + label {
        position: relative;
        cursor: pointer;
        display: inline-block;
        padding-left: 25px;
    }

    .styled-box + label:before,
    .styled-box + label:after {
        content: "";
        display: inline-block;
        width: 14px;
        height: 14px;
        margin-right: 10px;
        position: absolute;
        left: 0;
        bottom: 1px;
        background-color: transparent;
        border: 1px solid #cccccc;
    }

    .styled-box + label:after {
        border: none;
        display: none;
    }

    .styled-box + label:hover:before,
    .styled-box:focus + label:before {
        border-color: #ec4e42;
    }

    .styled-box:checked + label:before {
        width: 16px;
        height: 16px;
        background: #ec4e42;
        border: none;
    }

    .styled-box__check:checked + label:before {
        background-image: url("/images/mark.png");
        background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMCA4Ij48cGF0aCBpZD0ibWFyayIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjIiIGQ9Ik0xIDQuNUw0IDhsNS02IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48L3N2Zz4%3D");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 10px;
    }

    .styled-box__radio:checked + label:after {
        content: "";
        display: inline-block;
        width: 6px;
        height: 6px;
        background-color: #fff;
        left: 5px;
        bottom: 6px;
    }

    .styled-box__radio + label:before,
    .styled-box__radio + label:after {
        border-radius: 15px;
    }

    .social {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .social__item {
        display: inline-block;
        margin-left: 20px;
        line-height: 0;
    }

    .social__item:first-child {
        margin-left: 0;
    }

    .social__item_style_authored {
        position: relative;
    }

    #submit {
        padding: 15px;
        background: #ec4e42;
        border: none;
        font-weight: bold;
        color: #fff;
        font-size: 16px;
        margin-bottom: 16px;
    }

    .social__item_style_authored a:after {
        content: '';
        display: block;
        background-image: url('/images/authored.png');
        background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PGNpcmNsZSBjeD0iMTAiIGN5PSIxMCIgcj0iOSIgZmlsbD0iIzcxYzgzNyIgZmlsbC1ydWxlPSJldmVub2RkIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMiIvPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIxLjk5OTk5OTg4IiBkPSJNNi4wMDAxIDkuNTA1NzE3NGwzIDMuNDk5OTk5NiA1LTUuOTk5OTk5NiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+PC9zdmc+");
        background-repeat: no-repeat;
        background-size: 20px;
        width: 20px;
        height: 20px;
        position: absolute;
        bottom: -5px;
        right: -5px;
    }

    #submit:hover {
        cursor: pointer;
        background: #d74d41;
    }

    .combobox {
        position: relative;
    }

    .combobox input[type="text"] {
        padding: 0 0 0 115px;
        height: 38px;
        width: 300px;
        margin: 0;
        border: 1px solid #ccc;
    }

    .combobox select {
        background: none;
        height: 40px;
        border: none;
        margin: 0;
        padding: 0;
        position: absolute;
        left: 0;
        bottom: 0;
    }

    textarea {
        border: 1px solid #cccccc;
        width: 520px;
        height: 80px;
        margin-bottom: 20px;
    }

    .description {
        color: #999;
        font-size: 10px;
    }

    .dropdown__container {
        display: inline-block;
        position: absolute;
        line-height: 16px;
        display: none;
    }

    .dropdown__selected {
        border: 1px solid transparent;
        border-right: none;
        line-height: 14px;
        cursor: pointer;
        background-image: url("/images/expand.png");
        background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMC4wMDA1NjEgNi4wMDAyODE1Ij48cGF0aCBmaWxsPSJub25lIiBzdHJva2U9IiM5OTkiIGQ9Ik0uNTA0NzgwNy41MDUzMDYyOGw0LjQ5NiA0Ljk5NTAwMDAyIDQuNDk1LTQuOTk1MDAwMDIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjwvc3ZnPg%3D%3D");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px;
    }

    .dropdown {
        visibility: hidden;
        background: #fff;
        -webkit-box-shadow: 0px 3px 8px -3px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 3px 8px -3px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 3px 8px -3px rgba(0, 0, 0, 0.75);
        padding-bottom: 10px;
    }

    .dropdown__container_open .dropdown__selected {
        background: #f2f2f2;
        color: #999;
        border: 1px solid #ccc;
        border-right: none;
        background-image: url("/images/shrink.png");
        background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMC4wMDA1NjEgNi4wMDAyODE1Ij48cGF0aCBmaWxsPSJub25lIiBzdHJva2U9IiM5OTkiIGQ9Ik0uNTA0NzgwNyA1LjQ5NDk3NTNsNC40OTYtNC45OTUwMDAwMyA0LjQ5NSA0Ljk5NTAwMDAzIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48L3N2Zz4%3D");
        background-repeat: no-repeat;
        background-position: right 10px center;
        -webkit-background-size: 10px;
        background-size: 10px;
    }

    .dropdown__container_open .dropdown {
        visibility: visible;
    }

    .dropdown__item,
    .dropdown__selected {
        display: block;
        padding: 12px 30px 12px 12px;
        color: #999;
    }

    .dropdown__item:hover,
    .dropdown__item_active {
        background: #ec4e42;
        cursor: pointer;
        color: #fff;
    }

    .dropdown__item:hover + .dropdown__item_active,
    .dropdown__item_active + .dropdown__item:hover {
        border-top: 1px solid #fff;
        line-height: 15px;
    }

    .required {
        color: #ff7f2a;
    }

    .sub-list,
    .help-translate .help-list__item {
        display: none;
    }

    .no-js .sub-list,
    .no-js .help-translate .help-list__item {
        display: block;
    }
</style>
