<?php

/*
 * This file is part of Twig.
 *
 * (c) 2012 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Embeds a template.
 */
class Twig_TokenParser_Embed extends Twig_TokenParser_Include
{
<<<<<<< HEAD
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function parse(Twig_Token $token)
    {
        $stream = $this->parser->getStream();

        $parent = $this->parser->getExpressionParser()->parseExpression();

        list($variables, $only, $ignoreMissing) = $this->parseArguments();

<<<<<<< HEAD
=======
        $parentToken = $fakeParentToken = new Twig_Token(Twig_Token::STRING_TYPE, '__parent__', $token->getLine());
        if ($parent instanceof Twig_Node_Expression_Constant) {
            $parentToken = new Twig_Token(Twig_Token::STRING_TYPE, $parent->getAttribute('value'), $token->getLine());
        } elseif ($parent instanceof Twig_Node_Expression_Name) {
            $parentToken = new Twig_Token(Twig_Token::NAME_TYPE, $parent->getAttribute('name'), $token->getLine());
        }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        // inject a fake parent to make the parent() function work
        $stream->injectTokens(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, '', $token->getLine()),
            new Twig_Token(Twig_Token::NAME_TYPE, 'extends', $token->getLine()),
<<<<<<< HEAD
            new Twig_Token(Twig_Token::STRING_TYPE, '__parent__', $token->getLine()),
=======
            $parentToken,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            new Twig_Token(Twig_Token::BLOCK_END_TYPE, '', $token->getLine()),
        ));

        $module = $this->parser->parse($stream, array($this, 'decideBlockEnd'), true);

        // override the parent with the correct one
<<<<<<< HEAD
        $module->setNode('parent', $parent);
=======
        if ($fakeParentToken === $parentToken) {
            $module->setNode('parent', $parent);
        }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->parser->embedTemplate($module);

        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Embed($module->getAttribute('filename'), $module->getAttribute('index'), $variables, $only, $ignoreMissing, $token->getLine(), $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $token)
    {
        return $token->test('endembed');
    }

<<<<<<< HEAD
    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getTag()
    {
        return 'embed';
    }
}
