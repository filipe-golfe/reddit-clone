import express from 'express';
import { validateRegisterSubredditFields } from './rules/subreddit/subreddit-create';
import { validateSubredditAddUserFields } from './rules/subreddit/subreddit-add-user';
import { validateManageModeratorRequestFields } from './rules/subreddit/manage-moderator-request';
import { adaptRoute } from '../adapters/express-route-adapter';
import { makeRegisterSubredditController } from '../factories/subreddit/register-subreddit';
import { makeSubredditAddUserController } from '../factories/subreddit/subreddit-add-user';
import { makeManageModeratorRequestController } from '../factories/subreddit/manage-moderator-request';

const subredditRoutes = express();

subredditRoutes.use(express.json());
subredditRoutes.post(
  '/subreddit/create',
  validateRegisterSubredditFields(),
  adaptRoute(makeRegisterSubredditController()),
);

subredditRoutes.post(
  '/subreddit/adduser',
  validateSubredditAddUserFields(),
  adaptRoute(makeSubredditAddUserController()),
);

subredditRoutes.post(
  '/subreddit/manageModeratorRequest',
  validateManageModeratorRequestFields(),
  adaptRoute(makeManageModeratorRequestController()),
);

export default subredditRoutes;
