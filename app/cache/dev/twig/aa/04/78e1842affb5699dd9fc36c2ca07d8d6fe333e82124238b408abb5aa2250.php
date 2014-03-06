<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_aa0478e1842affb5699dd9fc36c2ca07d8d6fe333e82124238b408abb5aa2250 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  79 => 29,  75 => 28,  70 => 26,  50 => 15,  46 => 14,  30 => 5,  26 => 3,  24 => 2,  106 => 36,  99 => 34,  90 => 30,  67 => 23,  58 => 20,  49 => 13,  27 => 8,  19 => 1,  196 => 58,  193 => 57,  188 => 52,  185 => 51,  180 => 47,  175 => 44,  167 => 39,  159 => 38,  151 => 31,  147 => 30,  143 => 29,  139 => 27,  136 => 26,  132 => 18,  118 => 16,  114 => 13,  110 => 11,  107 => 10,  101 => 6,  96 => 60,  94 => 57,  89 => 54,  87 => 51,  82 => 27,  80 => 47,  76 => 45,  74 => 44,  62 => 24,  57 => 35,  44 => 19,  42 => 12,  35 => 6,  66 => 25,  63 => 21,  41 => 11,  32 => 6,  29 => 4,  92 => 25,  83 => 30,  77 => 25,  71 => 24,  64 => 15,  60 => 14,  55 => 26,  47 => 9,  40 => 7,  37 => 6,  31 => 5,  28 => 1,);
    }
}
