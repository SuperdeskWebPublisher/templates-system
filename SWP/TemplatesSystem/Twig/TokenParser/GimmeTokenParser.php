<?php

namespace SWP\TemplatesSystem\Twig\TokenParser;

use SWP\TemplatesSystem\Twig\Node\GimmeNode;

/**
 * Parser for gimme/endgimme blocks.
 */
class GimmeTokenParser extends \Twig_TokenParser
{
    /**
     * @param \Twig_Token $token
     *
     * @return boolean
     */
    public function decideCacheEnd(\Twig_Token $token)
    {
        return $token->test('endgimme');
    }

    /**
     * {@inheritDoc}
     */
    public function getTag()
    {
        return 'gimme';
    }

    /**
     * {@inheritDoc}
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $annotation = $this->parser->getExpressionParser()->parseAssignmentExpression();
        $parameters = null;
        if ($stream->nextIf(\Twig_Token::NAME_TYPE, 'with')) {
            $parameters = $this->parser->getExpressionParser()->parseExpression();
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideCacheEnd'), true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new GimmeNode($annotation, $parameters, $body, $lineno, $this->getTag());
    }
}
