<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REST Server Tests</title>

    <style>
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #FFF;
            margin: 40px;
            font: 16px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
            word-wrap: break-word;
        }

        a {
            color: #039;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 24px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 16px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 16px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        .box {
            border: 2px solid #D0D0D0;
            padding: 0 10px 0 10px;
            margin-bottom: 4px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        span {
            font-style: italic;
            color: blue;
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>REST Server Tests</h1>

        <div id="body">

            <h2><a href="<?php echo site_url(); ?>">Home</a></h2>

            <p>
                Repository :
                <a href="https://github.com/ridwantanjung/ci-restserver" target="_blank">
                    https://github.com/ridwantanjung/ci-restserver
                </a>
            </p>

            <p>
                For test, By default the apikey is 123456.
            </p>
            <p>
                You can test with <a href="https://www.getpostman.com/">Postman</a>, <a href="https://www.soapui.org/">SOAPUI</a> or etc,
            </p>
            <div class="box">
                <h3>GET</h3>
                <h5>param :</h5>
                <ul>
                    <li>id : <span>{int} </span></li>
                    <li>ci-apikey : <span>{your apikey}</span></li>
                </ul>
            </div>
            <div class="box">
                <h3>POST</h3>
                <h5>param :</h5>
                <ul>
                    <li>srn : <span>{int}</span></li>
                    <li>name : <span>{string}</span></li>
                    <li>email : <span>{valid email}</span></li>
                    <li>Major : <span>{string}</span></li>
                    <li>ci-apikey : <span>{your apikey}</span></li>
                </ul>
            </div>
            <div class="box">
                <h3>PUT</h3>
                <h5>param :</h5>
                <ul>
                    <li>srn : <span>{int}</span></li>
                    <li>name : <span>{string}</span></li>
                    <li>email : <span>{valid email}</span></li>
                    <li>Major : <span>{string}</span></li>
                    <li>id : <span>{int}</span></li>
                    <li>ci-apikey : <span>{your apikey}</span></li>
                </ul>
            </div>
            <div class="box">
                <h3>DELETE</h3>
                <h5>param :</h5>
                <ul>
                    <li>id : <span>{int}</span></li>
                    <li>ci-apikey : <span>{your apikey}</span></li>
                </ul>
            </div>
        </div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js" integrity="sha256-apFUVcutYBHTJh5O835gpzGcVk3v6iUxg38lKBpQMDA=" crossorigin="anonymous"></script>

    <script>
        // // Create an 'App' namespace
        // var App = App || {};

        // // Basic rest module using an IIFE as a way of enclosing private variables
        // App.rest = (function restModule(window) {
        //     // Fields
        //     var _alert = window.alert;
        //     var _JSON = window.JSON;

        //     // Cache the jQuery selector
        //     var _$ajax = null;

        //     // Cache the jQuery object
        //     var $ = null;

        //     // Methods (private)

        //     /**
        //      * Called on Ajax done
        //      *
        //      * @return {undefined}
        //      */
        //     function _ajaxDone(data) {
        //         // The 'data' parameter is an array of objects that can be iterated over
        //         _alert(_JSON.stringify(data, null, 2));
        //     }

        //     /**
        //      * Called on Ajax fail
        //      *
        //      * @return {undefined}
        //      */
        //     function _ajaxFail() {
        //         _alert('Oh no! A problem with the Ajax request!');
        //     }

        //     /**
        //      * On Ajax request
        //      *
        //      * @param {jQuery} $element Current element selected
        //      * @return {undefined}
        //      */
        //     function _ajaxEvent($element) {
        //         $.ajax({
        //                 // URL from the link that was 'clicked' on
        //                 url: $element.attr('href')
        //             })
        //             .done(_ajaxDone)
        //             .fail(_ajaxFail);
        //     }

        //     /**
        //      * Bind events
        //      *
        //      * @return {undefined}
        //      */
        //     function _bindEvents() {
        //         // Namespace the 'click' event
        //         _$ajax.on('click.app.rest.module', function(event) {
        //             event.preventDefault();

        //             // Pass this to the Ajax event function
        //             _ajaxEvent($(this));
        //         });
        //     }

        //     /**
        //      * Cache the DOM node(s)
        //      *
        //      * @return {undefined}
        //      */
        //     function _cacheDom() {
        //         _$ajax = $('#ajax');
        //     }

        //     // Public API
        //     return {
        //         /**
        //          * Initialise the following module
        //          *
        //          * @param {object} jQuery Reference to jQuery
        //          * @return {undefined}
        //          */
        //         init: function init(jQuery) {
        //             $ = jQuery;

        //             // Cache the DOM and bind event(s)
        //             _cacheDom();
        //             _bindEvents();
        //         }
        //     };
        // }(window));

        // // DOM ready event
        // $(function domReady($) {
        //     // Initialise the App module
        //     App.rest.init($);
        // });
    </script>

</body>

</html>