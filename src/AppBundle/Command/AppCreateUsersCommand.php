<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class AppCreateUsersCommand extends ContainerAwareCommand
{
    /**
     * 配置.
     */
    protected function configure()
    {
        $this
            ->setName('app:create-users')
            ->setDescription('创建新用户.')
            ->setHelp('这个命令允许你用来创建用户.')
            ->addArgument('userName', InputArgument::OPTIONAL, '用户名称')
            ->addArgument('passWord', InputArgument::OPTIONAL, '用户密码')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    /**
     * 执行命令.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);
        $table
            ->setHeaders(['ISBN', 'Title', 'Author'])
            ->setRows([
                ['99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'],
                ['9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'],
                new TableSeparator(),
                ['960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'],
                ['80-902734-1-6', 'And Then There Were None', 'Agatha Christie'],
            ])
        ;
        $table->render();
        //创建一个新的进度条（50单元）
        $progress = new ProgressBar($output);
        ProgressBar::setFormatDefinition(
            'minimal',
            '<info>%percent%</info>\033[32m%\033[0m <fg=white;bg=blue>%remaining%</>'
        );
        //启动并显示进度条
        $progress->setMessage('队列开始');
        $progress->start();
        $progress->setMessage('任务进行中...');
        $i= 0;
        while ($i++ < 10) {
            usleep(10000);
            //推进进度条的一个单位
            $progress->advance(2);
        }
        //确保进度条达到100%
        $progress->setMessage('任务完成');
        $progress->finish();
        $output->writeln('');

        /*$userName = $input->getArgument('userName');

        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln([
            '用户生成器',
            '========',
            '',
        ]);
        $output->writeln('UserName:' . $userName);
        $output->writeln('PassWord:' . $input->getArgument('passWord'));

        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            '请选择你喜欢的颜色(默认是red)',
            ['red', 'blue', 'yellow'],
            0
        );
        $question->setErrorMessage('颜色 %s 无效');

        $color = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected:' . $color);

        $bundles = ['AcmeDemoBundle', 'AcmeBlogBundle', 'AcmeStoreBundle'];
        $question = new Question('Please enter the name of a bundle', 'FooBundle');
        $question->setAutocompleterValues($bundles);
        $name = $helper->ask($input, $output, $question);
        $output->writeln('You input bundle is ' . $name);

        $question = new Question('What is the database password?');
        $question->setHidden(true);
        $question->setHiddenFallback(false);

        $password = $helper->ask($input, $output, $question);
        $output->writeln('您的密码是：' . $password);*/
    }
}
