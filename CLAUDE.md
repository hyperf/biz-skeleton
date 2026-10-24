# Subagent 定义
> 主线规则：主线只接收子代理返回的精简结论，不接收原始文件全文、冗长日志、中间试错过程；主线禁止大量 read / 反复 grep / 直接执行耗时 bash 测试。

- `explore-agent`（`.claude/agents/explore-agent.md`）：只读调研，输出【范围/现状/风险点/方案/拒绝】。
- `verify-agent`（`.claude/agents/verify-agent.md`）：跑测试与校验，只回传通过/失败摘要。

调用示例：
> @explore-agent 任务：梳理【xxx模块】，输出可执行的修改方案。
> @verify-agent 任务：执行单元测试，返回精简结果。

# 项目固定知识（按需改成你自己项目）
## 项目结构约定
- 配置文件目录：config
- 路由文件: config/routes.php
- 项目源码目录: app
- 静态监测命令：composer analyse
- 单元测试命令：composer test

## 主线工作流（plan 模式）
1. 用户提出需求
2. 主线委派 @explore-agent 调研，拿到定稿方案
3. 人审核方案，确认无误
4. 主线开始执行代码变更（主线只做 edit/write）
5. 改完之后，委派 @verify-agent 跑测试校验
6. verify 返回结果，主线汇总给用户
7. 监控 /context，接近 80k 主动新开会话，避免自动压缩消耗 token

## 成本与上下文规则
- 不要依赖 UI token 数字，使用 /cost 查看真实花费
- 不要在主线反复探索、反复查结构；结构信息固化在本 CLAUDE.md
- 不要同时启动多个 explore-agent，避免重复扫描仓库

