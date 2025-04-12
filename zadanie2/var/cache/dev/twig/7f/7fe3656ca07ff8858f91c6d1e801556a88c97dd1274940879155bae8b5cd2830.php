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

/* cart/index.html.twig */
class __TwigTemplate_9216240d9751dc6487f7a6b0671ff7820e31aa6a1f4e299a1f619bd184ef3932 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cart/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cart/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <title>Cart List</title>
</head>
<body>
    <h1>List of Items in Cart</h1>
    <ul>
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 9, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            yield "            <li>
                Product ID: ";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "productId", [], "any", false, false, false, 11), "html", null, true);
            yield " - Quantity: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 11), "html", null, true);
            yield "
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "    </ul>
    <h1>Add New Item to Cart</h1>

    <form action=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart_create");
        yield "\" method=\"POST\">
        <label for=\"productId\">Product ID:</label>
        <input type=\"number\" id=\"productId\" name=\"productId\" required>
        
        <label for=\"quantity\">Quantity:</label>
        <input type=\"number\" id=\"quantity\" name=\"quantity\" required>
        
        <button type=\"submit\">Add to Cart</button>
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
        return "cart/index.html.twig";
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
        return array (  77 => 17,  72 => 14,  61 => 11,  58 => 10,  54 => 9,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <title>Cart List</title>
</head>
<body>
    <h1>List of Items in Cart</h1>
    <ul>
        {% for item in cart %}
            <li>
                Product ID: {{ item.productId }} - Quantity: {{ item.quantity }}
            </li>
        {% endfor %}
    </ul>
    <h1>Add New Item to Cart</h1>

    <form action=\"{{ path('cart_create') }}\" method=\"POST\">
        <label for=\"productId\">Product ID:</label>
        <input type=\"number\" id=\"productId\" name=\"productId\" required>
        
        <label for=\"quantity\">Quantity:</label>
        <input type=\"number\" id=\"quantity\" name=\"quantity\" required>
        
        <button type=\"submit\">Add to Cart</button>
    </form>
</body>
</html>
", "cart/index.html.twig", "/home/tomasz/projektowanie-obiektowe/zadanie2/templates/cart/index.html.twig");
    }
}
