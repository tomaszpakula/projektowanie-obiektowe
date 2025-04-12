<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* product/index.html.twig */
class __TwigTemplate_6f535e2f7bf4168c4b41acf4c264d878301a5a407fb21b5b84d2a7c8d164638d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/index.html.twig"));

        // line 2
        yield "
<!DOCTYPE html>
<html>
  <head>
    <title>Product List</title>
  </head>
  <body>
    ";
        // line 9
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 9, $this->source); })()))) {
            // line 10
            yield "    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mock_login");
            yield "\">Sing in</a>
    ";
        } else {
            // line 12
            yield "    <p>
      Hello ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 13, $this->source); })()), "html", null, true);
            yield " <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_panel");
            yield "\">admin panel </a
      ><a href=\"";
            // line 14
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
            yield "\">Logout</a>
    </p>
    ";
        }
        // line 17
        yield "
    <h1>List of Products</h1>
    <ul>
      ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 21
            yield "      <li>
        <a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_get", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source,             // line 23
$context["product"], "name", [], "any", false, false, false, 23), "html", null, true);
            // line 24
            yield "</a>
        - \$";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 25), "html", null, true);
            yield "
      </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        yield "    </ul>
    <h1>Create New Product</h1>

    <form action=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_create");
        yield "\" method=\"POST\">
      <label for=\"name\">Product Name:</label>
      <input type=\"text\" id=\"name\" name=\"name\" required />

      <label for=\"price\">Product Price:</label>
      <input type=\"number\" id=\"price\" name=\"price\" required />

      <button type=\"submit\">Create Product</button>
    </form>
  </body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "product/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  110 => 31,  105 => 28,  96 => 25,  93 => 24,  91 => 23,  88 => 22,  85 => 21,  81 => 20,  76 => 17,  70 => 14,  64 => 13,  61 => 12,  55 => 10,  53 => 9,  44 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/product/index.html.twig #}

<!DOCTYPE html>
<html>
  <head>
    <title>Product List</title>
  </head>
  <body>
    {% if user is empty %}
    <a href=\"{{ path('mock_login') }}\">Sing in</a>
    {% else %}
    <p>
      Hello {{ user }} <a href=\"{{ path('admin_panel') }}\">admin panel </a
      ><a href=\"{{ path('logout') }}\">Logout</a>
    </p>
    {% endif %}

    <h1>List of Products</h1>
    <ul>
      {% for product in products %}
      <li>
        <a href=\"{{ path('product_get', { id: product.id }) }}\">{{
          product.name
        }}</a>
        - \${{ product.price }}
      </li>
      {% endfor %}
    </ul>
    <h1>Create New Product</h1>

    <form action=\"{{ path('product_create') }}\" method=\"POST\">
      <label for=\"name\">Product Name:</label>
      <input type=\"text\" id=\"name\" name=\"name\" required />

      <label for=\"price\">Product Price:</label>
      <input type=\"number\" id=\"price\" name=\"price\" required />

      <button type=\"submit\">Create Product</button>
    </form>
  </body>
</html>
", "product/index.html.twig", "/home/tomasz/projektowanie-obiektowe/zadanie2/templates/product/index.html.twig");
    }
}
