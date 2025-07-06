<?php
declare(strict_types=1);

namespace Macademy\Blog\Setup\Patch\Data;

use Macademy\Blog\Api\PostRepositoryInterface;
use Macademy\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateBlogPosts implements DataPatchInterface
{
    private $moduleDataSetup;
    private $postRepository;
    private $postFactory;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup, PostFactory $postFactory, PostRepositoryInterface $postRepository)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $posts = [
            [
                'title' => 'Today is sunny',
                'content' => 'The weather has been great all week.',
            ],
            [
                'title' => 'My movie review',
                'content' => 'I give this movie 5 out of 5 stars!',
            ],
            [
                'title' => 'My nice story',
                'content' => 'I will tell you my first story!',
            ],
        ];

        foreach ($posts as $postData) {
            $post = $this->postFactory->create();
            $post->setData($postData);
            $this->postRepository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}
